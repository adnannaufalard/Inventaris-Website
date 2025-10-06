<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kategori Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('kategori.store') }}">
                        @csrf

                        <div>
                            <label for="nama_kategori" class="block font-medium text-sm text-gray-700">Nama Kategori</label>
                            <input id="nama_kategori" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="deskripsi" class="block font-medium text-sm text-gray-700">Deskripsi (Opsional)</label>
                            <textarea id="deskripsi" name="deskripsi" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('kategori.index') }}" class="px-4 py-2 bg-gray-200 rounded-md text-sm font-semibold text-gray-800">Batal</a>
                            <button type="submit" class="ms-4 px-4 py-2 bg-gray-800 rounded-md text-sm font-semibold text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>