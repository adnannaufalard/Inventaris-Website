<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center mb-6">
                        <a href="{{ route('barang.index') }}" class="text-blue-600 hover:text-blue-800">&larr; Kembali ke Daftar Barang</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            @if($barang->gambar)
                                <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar Barang" class="w-full h-64 object-cover rounded-lg">
                            @else
                                <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-500">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>

                        <div>
                            <h3 class="text-2xl font-bold mb-4">{{ $barang->nama_barang }}</h3>
                            <p class="text-gray-600 mb-2"><strong>Kategori:</strong> {{ $barang->kategori->nama_kategori ?? 'Tanpa Kategori' }}</p>
                            <p class="text-gray-600 mb-2"><strong>Stok:</strong> {{ $barang->stok }}</p>
                            <p class="text-gray-600 mb-4"><strong>Harga:</strong> Rp {{ number_format($barang->harga, 0, ',', '.') }}</p>

                            <div class="flex space-x-2">
                                <a href="{{ route('barang.edit', $barang->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                                    Edit
                                </a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
