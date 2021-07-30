Product ID:{{$id}}
<div>
    @if($id==1)
        1 numaralı ürün gösterilmektedir
    @else
        Diğer ürün gösterilmektedir
    @endif
</div>
{{--Deneme--}}
<div>
    @for($i=0;$i<4;$i++)
        <p>Döngü degeri {{$i}}
    @endfor
</div>

<div>
    @foreach($categories as $cat)
        {{$cat}}<br>
    @endforeach
</div>

