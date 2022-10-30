@foreach($productList as $item)
@php
$sl = 1;
@endphp
<tr>
   
    <td class="text-center">{{ $item->title }}</td>
    <td class="text-center">{!! $item->description !!}</td>
    <td class="text-center">{{ $item->subcategory->name }}</td>
    <td class="text-center">{{ $item->price }}</td>
    <td class="text-center">
        <img class="img-responsive" width="50" alt="Not Found!" src="{{URL::to('/')}}/public/uploads/{{ $item->thumbnail }}" />
    </td>
    <td class="text-center">
        <!-- <button type="button" value="{{ $item->id }}" class="edit_product btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</button> -->
        <button type="button" value="{{ $item->id }}" class="delete_product btn btn-danger btn-sm">Delete</button>
    </td>
</tr>

@php
$sl++;
@endphp
@endforeach