<!DOCTYPE html>
<html>

<head>

    <title>DataTables CRUD</title>

    <link rel="stylesheet"
    href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<style>

body{
    font-family:Arial;
    padding:40px;
}

tbody tr{
    cursor:pointer;
}

.modal{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
}

.modal-content{
    background:white;
    width:350px;
    margin:100px auto;
    padding:20px;
}

input{
    width:100%;
    padding:6px;
    margin-bottom:10px;
}

button{
    padding:6px 15px;
    cursor:pointer;
}

.delete{
    background:red;
    color:white;
}

.update{
    background:green;
    color:white;
}

/* SPINNER */

.spinner{
    width:16px;
    height:16px;
    border:3px solid #ccc;
    border-top:3px solid black;
    border-radius:50%;
    animation:spin 0.8s linear infinite;
    display:inline-block;
    margin-right:5px;
}

@keyframes spin{
    0%{transform:rotate(0deg);}
    100%{transform:rotate(360deg);}
}

</style>

</head>



<body>

<h3>Input Barang</h3>

<form id="formBarang">

Nama barang
<input type="text" id="nama" required>

Harga barang
<input type="number" id="harga" required>

<button type="button" id="btnSubmit">
submit
</button>

</form>



<table id="tableBarang" class="display">

<thead>
<tr>
<th>ID</th>
<th>Nama</th>
<th>Harga</th>
</tr>
</thead>

<tbody>

</tbody>

</table>



<div class="modal" id="modalEdit">

<div class="modal-content">

<form id="formEdit">

ID barang
<input type="text" id="editId" readonly>

Nama barang
<input type="text" id="editNama" required>

Harga barang
<input type="number" id="editHarga" required>

<button type="button" class="delete" id="btnDelete">
Hapus
</button>

<button type="button" class="update" id="btnUpdate">
Ubah
</button>

</form>

</div>

</div>



<script>

let id=1; // untuk id barang berurutan mulai dari 1 (counter)
let selectedRow;

$(document).ready(function(){

const table = $('#tableBarang').DataTable(); 



/* ======================
   CREATE
====================== */

$('#btnSubmit').click(function(){

const form=document.getElementById("formBarang");
const btn=this;

if(!form.checkValidity()){
form.reportValidity();
return;
}

btn.innerHTML='<span class="spinner"></span>Loading...';
btn.disabled=true;

setTimeout(function(){

const nama=$('#nama').val();
const harga=$('#harga').val();

table.row.add([
id++, // counter id barang setelah ditampilkan (row bertambah) baru id bertambah
nama,
harga
]).draw();

$('#nama').val('');
$('#harga').val('');

btn.innerHTML='submit';
btn.disabled=false;

},600);

});



/* ======================
   OPEN MODAL
====================== */

$('#tableBarang tbody').on('click','tr',function(){

selectedRow=table.row(this);

const data=selectedRow.data();

$('#editId').val(data[0]);
$('#editNama').val(data[1]);
$('#editHarga').val(data[2]);

$('#modalEdit').show();

});



/* ======================
   UPDATE
====================== */

$('#btnUpdate').click(function(){

const form=document.getElementById("formEdit");
const btn=this;

if(!form.checkValidity()){
form.reportValidity();
return;
}

btn.innerHTML='<span class="spinner"></span>Loading...';
btn.disabled=true;

setTimeout(function(){

selectedRow.data([
$('#editId').val(),
$('#editNama').val(),
$('#editHarga').val()
]).draw();

$('#modalEdit').hide();

btn.innerHTML='Ubah';
btn.disabled=false;

},500);

});



/* ======================
   DELETE
====================== */

$('#btnDelete').click(function(){

const btn=this;

btn.innerHTML='<span class="spinner"></span>Loading...';
btn.disabled=true;

setTimeout(function(){

selectedRow.remove().draw();
$('#modalEdit').hide();

btn.innerHTML='Hapus';
btn.disabled=false;

},500);

});

});

</script>

</body>
</html>