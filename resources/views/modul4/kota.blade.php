<!DOCTYPE html>
<html>
<head>

<title>Praktikum Select Kota</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>

body{
    font-family:Arial;
    padding:40px;
}

.card{
    border:1px solid #ccc;
    padding:20px;
    margin-bottom:30px;
    width:500px;
}

.card h3{
    margin-top:0;
}

input{
    width:70%;
    padding:8px;
}

button{
    padding:8px 15px;
    background:green;
    color:white;
    border:none;
    cursor:pointer;
}

select{
    width:100%;
    padding:8px;
    margin-top:10px;
}

.label{
    margin-top:15px;
    display:block;
}

/* spinner */

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


<!-- ================= CARD 1 ================= -->

<div class="card">

<h3>Select</h3>

<label>Kota:</label>

<input type="text" id="kotaInput">

<button id="btnTambah">
Tambahkan
</button>


<span class="label">Select Kota:</span>

<select id="selectKota">

<option value="">-- pilih kota --</option>

</select>


<span class="label">
Kota Terpilih: <b id="kotaTerpilih"></b>
</span>

</div>



<!-- ================= CARD 2 ================= -->

<div class="card">

<h3>Select 2</h3>

<label>Kota:</label>

<input type="text" id="kotaInput2">

<button id="btnTambah2">
Tambahkan
</button>


<span class="label">Select Kota:</span>

<select id="selectKota2">

<option value="">-- pilih kota --</option>

</select>


<span class="label">
Kota Terpilih: <b id="kotaTerpilih2"></b>
</span>

</div>



<script>

/* ======================
   INIT SELECT2
====================== */

$(document).ready(function(){

    $('#selectKota2').select2();

});


/* ======================
   TAMBAH KOTA CARD 1
====================== */

document.getElementById("btnTambah").addEventListener("click",function(){

    const btn=this;
    const kota=document.getElementById("kotaInput").value;

    if(kota===""){
        alert("Isi kota terlebih dahulu");
        return;
    }

    btn.innerHTML='<span class="spinner"></span>Loading';
    btn.disabled=true;

    setTimeout(function(){

        const select=document.getElementById("selectKota");

        const option=document.createElement("option");

        option.value=kota;
        option.text=kota;

        select.appendChild(option);

        document.getElementById("kotaInput").value="";

        btn.innerHTML="Tambahkan";
        btn.disabled=false;

    },400);

});


/* ======================
   PILIH KOTA CARD 1
====================== */

document.getElementById("selectKota").addEventListener("change",function(){

    document.getElementById("kotaTerpilih").innerText=this.value;

});


/* ======================
   TAMBAH KOTA CARD 2
====================== */

document.getElementById("btnTambah2").addEventListener("click",function(){

    const btn=this;
    const kota=document.getElementById("kotaInput2").value;

    if(kota===""){
        alert("Isi kota terlebih dahulu");
        return;
    }

    btn.innerHTML='<span class="spinner"></span>Loading';
    btn.disabled=true;

    setTimeout(function(){

        const newOption = new Option(kota, kota, false, false);

        $('#selectKota2').append(newOption).trigger('change');

        document.getElementById("kotaInput2").value="";

        btn.innerHTML="Tambahkan";
        btn.disabled=false;

    },400);

});


/* ======================
   PILIH KOTA CARD 2
====================== */

$('#selectKota2').on('change', function(){

    $('#kotaTerpilih2').text($(this).val());

});

</script>


</body>
</html>