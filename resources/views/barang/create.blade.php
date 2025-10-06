<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Barang Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Tampilkan Error Validasi --}}
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Oops!</strong>
                            <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                            <ul class="list-disc pl-5 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="nama_barang" class="block font-medium text-sm text-gray-700">Nama Barang</label>
                            <input id="nama_barang" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="nama_barang" value="{{ old('nama_barang') }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="kategori_id" class="block font-medium text-sm text-gray-700">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mt-4">
                            <label for="stok" class="block font-medium text-sm text-gray-700">Stok</label>
                            <input id="stok" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="number" name="stok" value="{{ old('stok', 0) }}" required />
                        </div>

                        <div class="mt-4">
                            <label for="harga" class="block font-medium text-sm text-gray-700">Harga</label>
                            <input id="harga" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="number" name="harga" value="{{ old('harga', 0) }}" required />
                        </div>

                        <div class="mt-4">
                            <label for="gambar" class="block font-medium text-sm text-gray-700">Gambar Barang</label>
                            <div id="drop-area" class="mt-1 border-2 border-dashed border-gray-300 rounded-md p-6 text-center cursor-pointer hover:border-indigo-500 transition-colors">
                                <div id="drop-content">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <p class="mt-2 text-sm text-gray-600">Drag and drop gambar di sini, atau <span class="text-indigo-600 hover:text-indigo-500">klik untuk memilih</span></p>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                                </div>
                                <div id="preview" class="hidden mt-4">
                                    <img id="preview-img" class="max-w-full h-auto mx-auto rounded-md" />
                                    <button type="button" id="remove-preview" class="mt-2 text-red-600 hover:text-red-800 text-sm">Hapus gambar</button>
                                </div>
                            </div>
                            <input id="gambar" class="hidden" type="file" name="gambar" accept="image/*" />
                            <p class="mt-1 text-sm text-gray-500">Upload gambar barang (opsional, max 2MB, format: jpeg, png, jpg, gif)</p>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('barang.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300">
                                Batal
                            </a>
                            <button type="submit" class="ms-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('gambar');
        const dropContent = document.getElementById('drop-content');
        const preview = document.getElementById('preview');
        const previewImg = document.getElementById('preview-img');
        const removeBtn = document.getElementById('remove-preview');

        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        // Highlight drop area when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        // Handle dropped files
        dropArea.addEventListener('drop', handleDrop, false);

        // Handle click to select files
        dropArea.addEventListener('click', () => fileInput.click());
        fileInput.addEventListener('change', handleFiles);

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight(e) {
            dropArea.classList.add('border-indigo-500', 'bg-indigo-50');
        }

        function unhighlight(e) {
            dropArea.classList.remove('border-indigo-500', 'bg-indigo-50');
        }

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            setFileInput(files);
            handleFiles({ target: { files } });
        }

        function handleFiles(e) {
            const files = e.target.files;
            if (files.length > 0) {
                const file = files[0];
                if (file.type.startsWith('image/')) {
                    previewFile(file);
                }
            }
        }

        function setFileInput(files) {
            // Create a new input element with the selected files
            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = 'gambar';
            newInput.accept = 'image/*';
            newInput.style.display = 'none';

            // Create DataTransfer and add files
            const dt = new DataTransfer();
            for (let i = 0; i < files.length; i++) {
                dt.items.add(files[i]);
            }
            newInput.files = dt.files;

            // Replace the old input
            fileInput.parentNode.replaceChild(newInput, fileInput);
            fileInput = newInput;

            // Re-attach event listener
            fileInput.addEventListener('change', handleFiles);
        }

        function previewFile(file) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function() {
                previewImg.src = reader.result;
                dropContent.classList.add('hidden');
                preview.classList.remove('hidden');
            };
        }

        removeBtn.addEventListener('click', () => {
            // Create a new empty input
            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = 'gambar';
            newInput.accept = 'image/*';
            newInput.style.display = 'none';

            // Replace the old input
            fileInput.parentNode.replaceChild(newInput, fileInput);
            fileInput = newInput;

            // Re-attach event listener
            fileInput.addEventListener('change', handleFiles);

            preview.classList.add('hidden');
            dropContent.classList.remove('hidden');
        });
    </script>
</x-app-layout>