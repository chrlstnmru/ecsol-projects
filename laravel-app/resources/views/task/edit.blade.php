<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Edit Task ' . $task['id']) }}
    </h2>
  </x-slot>

  <form class="mx-auto max-w-7xl space-y-4 py-6" action="{{ route('task.update', $task['id']) }}" method="post">
    @method('patch')
    @csrf

    <div>
      <x-input-label for="title" :value="__('Title')" />
      <x-text-input class="mt-1 block w-full" id="title" name="title" type="text" :value="old('title', $task->title)" required
        autocomplete="off" />
      <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>

    <div class="flex flex-row-reverse items-center justify-end gap-2">
      <x-input-label for="completed" :value="__('Completed')" />
      <input id="completed" name="completed" type="checkbox" value="1"
        {{ old('completed', $task->completed) ? 'checked' : '' }} />
      <x-input-error class="mt-2" :messages="$errors->get('completed')" />
    </div>

    <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
  </form>
</x-app-layout>
