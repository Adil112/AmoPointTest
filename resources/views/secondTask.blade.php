<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Второе задание') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p>Тип &nbsp; &nbsp;<select name="type_val"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></p>

                <p>Поле 1&nbsp; &nbsp;<input name="input_1" type="text" /></p>

                <p>&nbsp;</p>

                <p>Поле 2&nbsp; &nbsp;<input name="input_2" type="text" /></p>

                <p>&nbsp;</p>

                <p>Поле 3&nbsp; &nbsp;<input name="input_3" type="text" /></p>

                <p>Поле 4&nbsp; &nbsp;<input name="input_4" type="text" /></p>

                <p>Поле 5&nbsp; &nbsp;<input name="input_5" type="text" /></p>

                <p>Поле 6&nbsp; &nbsp;<input name="input_6" type="text" /></p>

                <p>Поле 7&nbsp; &nbsp;<input name="input_7" type="text" /></p>

                <p><input name="button_12" type="button" value="Кнопка 1" /></p>

                <p><input name="button_28" type="button" value="Кнопка 2" /></p>

                <p><input name="button_88" type="button" value="Кнопка 4" /></p>

                <p><input name="button_33" type="button" value="Кнопка 3" /></p>

                <p><input name="button_1" type="button" value="Кнопка 8" /></p>


                <div class="mt-8">
                    <p class="mt-4 text-sm text-gray-600">Содержимое файла <span class="font-mono bg-gray-200 px-1">public/secondTask.js</span>:</p>
                    <div class="bg-gray-100 border border-gray-300 p-4 rounded-lg mt-2 text-xs font-mono whitespace-pre overflow-x-auto">
                        {{ file_get_contents(public_path('secondTask.js')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('secondTask.js') }}"></script>
</x-app-layout>
