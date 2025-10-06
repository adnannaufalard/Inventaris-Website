<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Inventaris Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- Tombol Tambah Barang --}}
                    <a href="{{ route('barang.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mb-4">
                        Tambah Barang
                    </a>

                    {{-- Tombol Export --}}
                    <a href="{{ route('barang.export') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 mb-4 ml-2">
                        Export CSV
                    </a>

                    {{-- Form Pencarian --}}
                    <form method="GET" action="{{ route('barang.index') }}" class="mb-4 flex items-center space-x-2">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama barang atau kategori..." class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Cari</button>
                        @if(request('search'))
                            <a href="{{ route('barang.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Reset</a>
                        @endif
                    </form>

                    {{-- Tabel Data Barang --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                            <thead class="text-left">
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gambar</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama Barang</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Kategori</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Stok</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Harga</th>
                                    <th class="px-4 py-2"></th>
                                </tr>
                            </thead>
                    
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($barangs as $item)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-2">
                                            @if($item->gambar)
                                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Barang" class="w-16 h-16 object-cover">
                                            @else
                                                <span class="text-gray-400">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            <a href="{{ route('barang.show', $item->id) }}" class="text-blue-600 hover:text-blue-800">{{ $item->nama_barang }}</a>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $item->stok }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td class="whitespace-nowrap px-4 py-2">
                                            <a href="{{ route('barang.edit', $item->id) }}" class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                                Edit
                                            </a>
                                            {{-- Tombol Delete --}}
                                            <button type="button" data-id="{{ $item->id }}" data-name="{{ $item->nama_barang }}" onclick="openDeleteModal(this)" class="inline-block rounded bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-gray-500 py-4">
                                            Tidak ada data barang.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Link Paginasi --}}
                    <div class="mt-4">
                        {{ $barangs->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Modal Konfirmasi Hapus --}}
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mt-4" id="modalTitle">Konfirmasi Hapus</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500" id="modalMessage">
                        Apakah Anda yakin ingin menghapus barang ini?
                    </p>
                </div>
                <div class="flex items-center px-4 py-3">
                    <button id="cancelBtn" class="px-4 py-2 bg-gray-300 text-gray-900 text-base font-medium rounded-md w-full mr-2 shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Batal
                    </button>
                    <button id="confirmBtn" class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Form Hapus Tersembunyi --}}
    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        let deleteItemId = null;

        function openDeleteModal(button) {
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            deleteItemId = id;
            document.getElementById('modalTitle').textContent = 'Hapus Barang';
            document.getElementById('modalMessage').textContent = `Apakah Anda yakin ingin menghapus barang "${name}"?`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        document.getElementById('cancelBtn').addEventListener('click', function() {
            document.getElementById('deleteModal').classList.add('hidden');
            deleteItemId = null;
        });

        document.getElementById('confirmBtn').addEventListener('click', function() {
            if (deleteItemId) {
                const form = document.getElementById('deleteForm');
                form.action = '{{ route("barang.destroy", ":id") }}'.replace(':id', deleteItemId);
                form.submit();
            }
        });

        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
                deleteItemId = null;
            }
        });
    </script>
</x-app-layout>