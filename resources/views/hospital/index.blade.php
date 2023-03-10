<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('病院ページ') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">病院一覧</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($hospitals as $hospital)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                  <a href="{{ route('hospital.show',$hospital->hospital_id) }}">
                    <h3 class="text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$hospital->hospital_name}}</h3>
                  </a>
                  <div class="flex">
                    <!-- 更新ボタン -->
                    <!-- 削除ボタン -->
                  </div>
                  <!-- <div>
                    <div class="flex">
                      <p>住所：</p>
                      <p class="text-left text-grey-dark">{{$hospital->address}}</p>
                    </div>
                    <div class="flex">
                      <p>TEL：</p>
                      <p class="text-left text-grey-dark">{{$hospital->tel}}</p>
                    </div>
                    <div class="flex">
                      <p>FAX：</p>
                      <p class="text-left text-grey-dark">{{$hospital->fax}}</p>
                    </div>
                  </div> -->
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
