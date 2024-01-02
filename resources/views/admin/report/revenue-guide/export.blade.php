<table>
     <thead>
         <tr>
             <th>Tanggal</th>
             <th>Nama</th>
             <th>Provinsi</th>
             <th>Kabupaten/kotamadya</th>
             <th>Kecamatan</th>
             <th>Nama Paket</th>
             <th>Paket</th>
             <th>Harga</th>
 
         </tr>
     </thead>
     <tbody>
         @foreach ($data as $row)
             <tr>
                 <td>
                     {{ date('d M Y, H:i:s', strtotime($row->created_at)) }}
                 </td>
                 <td>{{ $row->user_name }}</td>
                 <td>{{ $row->province_name }}</td>
                 <td>{{ $row->city_name }}</td>
                 <td>{{ $row->district_name }}</td>
                 <td>{{ $row->type->label() }}</td>
                 <td>{{ $row->benefit_value }} {{ $row->benefit_type }}</td>
                 <td>Rp{{ number_format($row->price) }}</td>
             </tr>
         @endforeach
     </tbody>
 </table>
 