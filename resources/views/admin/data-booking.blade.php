<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:nama>{{ $nama }}</x-slot:nama>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar booking</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor Booking</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Tanggal Booking</th>
                            <th>Batas Pengambilan</th>
                            <th>Confirm</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nomor Booking</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Tanggal Booking</th>
                            <th>Batas Pengambilan</th>
                            <th>Confirm</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($booking as $b)
                            <tr>
                                <td>{{ $b->id }}</td>
                                <td>{{ $b->user->nama }}</td>
                                <td class="text-center">
                                    <a class="border-0 badge badge-info mr-2 p-2" href="/detail-booking-user/{{ $b->id }}">Detail</a>
                                </td>
                                <td class="text-center">{{ $b->tgl_booking }}</td>
                                <td class="text-center">{{ $b->batas_ambil }}</td>
                                <td class="text-center">
                                    <form action="/confirm-booking-user/{{ $b->id }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="border-0 badge badge-success p-2">
                                            Confirm
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin>
