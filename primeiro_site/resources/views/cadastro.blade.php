
    @foreach ($itens as $item)
<table border=1>  
    <tr>
            <td>{{$item['item']}} {{$item['price']}} {{$item['desc']}}<br></td>
        </tr>
</table>
    @endforeach