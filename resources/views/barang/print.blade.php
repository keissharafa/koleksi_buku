<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>

@page {
    size: A4 portrait;
    margin: 3mm;
}

body{
    margin: 0;
    font-family: Arial, sans-serif;

    display: flex;
    justify-content: center;
    align-items: center;

    height: 100vh;
}

/* area label */
.sheet{
    width: 202mm;
}

/* grid */
table{
    border-collapse: separate;
    border-spacing: 2mm 2mm;
}

td{
    width: 38mm;
    height: 18mm;

    text-align: center;
    vertical-align: middle;

    border: 0.05mm dashed rgba(0,0,0,0.15);
}

/* tunning */
.content{
    transform: translate(0mm, 0mm); 
}

.nama{
    font-size: 8px;
    line-height: 1.1;
}

.harga{
    font-size: 10px;
    line-height: 1.2;
}

</style>

</head>

<body>

<div class="sheet">

<table>

@for($row = 1; $row <= 8; $row++)
<tr>

@for($col = 1; $col <= 5; $col++)
<td>

@if(isset($labels[$row][$col]))

<div class="content">

    <div class="nama">
        {{ $labels[$row][$col]->nama }}
    </div>

    <div class="harga">
        Rp {{ number_format($labels[$row][$col]->harga,0,',','.') }}
    </div>

    <img 
        src="data:image/png;base64,{{ $labels[$row][$col]->barcode }}"
        width="80"
    >

    <div style="font-size:5px;">
        {{ $labels[$row][$col]->id_barang }}
    </div>

</div>

@endif

</td>
@endfor

</tr>
@endfor

</table>

</div>

</body>
</html>