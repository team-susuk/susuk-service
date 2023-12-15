<table>
     <thead>
         <tr>
             <th>Nama</th>
             <th>Merchant</th>
             <th>Deskripsi</th>
             <th>Price</th>
             <th>Komisi</th>
 
         </tr>
     </thead>
     <tbody>
         @foreach ($data as $row)
             <tr>
                 <td>{{ $row->name }}</td>
                 <td>{{ $row->merchant?->name }}</td>
                 <td>{{ $row->description }}</td>
                 <td>{{ number_format($row->price) }}</td>
                 <td>{{ $row->commission }}%</td>
             </tr>
         @endforeach
     </tbody>
 </table>
 @if ($type == 'pdf')
     <style>
         table tr th,
         table tr td {
             font-size: 12px
         }
     </style>
 @endif
 