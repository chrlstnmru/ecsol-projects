<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">

    <div class="mx-auto flex max-w-7xl flex-col gap-4 sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
        <form class="flex items-center justify-between p-6 text-gray-900 dark:text-gray-100"
          action="{{ route('task.create') }}" method="post">
          @csrf
          <div class="flex w-full items-center gap-4">
            <x-text-input class="mt-1 block flex-1" id="title" name="title" type="text"
              placeholder="Enter task..." required autofocus autocomplete="off" />

            <x-primary-button class="h-full max-h-full">{{ __('Save') }}</x-primary-button>
          </div>
          <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </form>
      </div>

      @if (session('status') === 'task-created')
        <p class="text-sm text-gray-600 dark:text-gray-400" x-data="{ show: true }" x-show="show" x-transition
          x-init="setTimeout(() => show = false, 2000)">{{ __('Task Created.') }}</p>
      @endif

      @if (session('status') === 'task-deleted')
        <p class="text-sm text-gray-600 dark:text-gray-400" x-data="{ show: true }" x-show="show" x-transition
          x-init="setTimeout(() => show = false, 2000)">{{ __('Task Deleted.') }}</p>
      @endif

      {{-- <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          {{ __("You're logged in!") }}
        </div>
      </div> --}}

      @foreach ($tasks as $task)
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
          <div class="flex items-center justify-between p-6 text-gray-900 dark:text-gray-100">
            <span @class(['line-through' => $task['completed']])>
              {{ __($task['title']) }}
            </span>

            <div class="flex items-center gap-4">
              <a href="{{ route('task.edit', $task['id']) }}">Edit</a>
              <form action="{{ route('task.destroy', $task['id']) }}" method="post">
                @csrf
                @method('delete')
                <button class="text-red-600 dark:text-red-400">Delete</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</x-app-layout>
