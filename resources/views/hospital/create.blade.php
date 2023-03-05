<!-- resources/views/hospital/create.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create New Hospital') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
          @include('common.errors')
          <form class="mb-6" action="{{ route('hospital.store') }}" method="POST">
            @csrf
            <div class="flex flex-col mb-4">

              <x-input-label for="hospital_name" :value="__('病院名')" />
              <x-text-input id="hospital" class="block mt-1 w-full" type="text" name="hospital_name" :value="old('hospital_name')" required autofocus />
              <x-input-error :messages="$errors->get('hospital_name')" class="mt-2" />

              <x-input-label for="hospital_name" :value="__('住所')" />
              <x-text-input id="hospital" class="block mt-1 w-full" type="text" name="hospital_name" :value="old('hospital_name')" required autofocus />
              <x-input-error :messages="$errors->get('address')" class="mt-2" />

              <x-input-label for="hospital_name" :value="__('電話番号')" />
              <x-text-input id="hospital" class="block mt-1 w-full" type="text" name="hospital_name" :value="old('hospital_name')" required autofocus />
              <x-input-error :messages="$errors->get('tel')" class="mt-2" />
              
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="address" :value="__('アドレス')" />
              <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
              <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="tel" :value="__('TEL')" />
              <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required autofocus />
              <x-input-error :messages="$errors->get('tel')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="fax" :value="__('FAX')" />
              <x-text-input id="fax" class="block mt-1 w-full" type="text" name="fax" :value="old('fax')" required autofocus />
              <x-input-error :messages="$errors->get('fax')" class="mt-2" />
            </div>
            <div class="flex item s-center justify-end mt-4">
              <x-primary-button class="ml-3">
                {{ __('Create') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
