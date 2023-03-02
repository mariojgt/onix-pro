<x-onix::layout.main>
    <div class="flex items-center justify-center h-screen bg-slate-700">
        <div class="bg-white rounded-3xl border shadow-xl p-3 w-11/12">
            <div class="justify-between items-center mb-4">
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $item)
                                <!-- row 1 -->
                                <tr>
                                    <th>{{ $item->title }}</th>
                                    <td>{{ $item->slug }}</td>
                                    <td>
                                        <div class="preview border-base-300 bg-base-200 rounded-b-box rounded-tr-box flex min-h-[6rem] min-w-[18rem] max-w-4xl flex-wrap items-center justify-center gap-2 overflow-x-hidden border bg-cover bg-top p-4 undefined"
                                            style="background-size: 5px 5px">
                                            <a href="{{ route('onix.editor', $item->slug) }}"
                                                class="btn btn-primary">Edit</a>
                                            <button class="btn btn-active btn-error">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <h1 class="font-semibold text-xl text-gray-700">Avaliable Pages</h1>
            </div>
        </div>
    </div>
</x-onix::layout.main>
