<!DOCTYPE html>
<html>

<head>

    <title>HTML Table CRUD</title>

    <style>

        body {
            font-family: Arial;
            padding: 40px;
        }

        table {
            border-collapse: collapse;
            width: 500px;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        tbody tr {
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
        }

        .modal-content {
            background: white;
            width: 350px;
            margin: 120px auto;
            padding: 20px;
        }

        input {
            width: 100%;
            padding: 6px;
            margin-bottom: 10px;
        }

        button {
            padding: 6px 15px;
            cursor: pointer;
        }

        .delete {
            background: red;
            color: white;
        }

        .update {
            background: green;
            color: white;
        }

        /* SPINNER */

        .spinner {
            width: 16px;
            height: 16px;
            border: 3px solid #ccc;
            border-top: 3px solid black;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            display: inline-block;
            margin-right: 5px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

    </style>

</head>


<body>

<h3>Input Barang</h3>

<form id="formBarang">

    Nama barang :
    <input type="text" id="nama" required>

    <br>

    Harga barang :
    <input type="number" id="harga" required>

    <br><br>

    <button type="button" id="btnSubmit">
        submit
    </button>

</form>


<table id="tableBarang">

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


<!-- MODAL EDIT -->

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

/* ======================
   VARIABLE
====================== */

let id = 1; // untuk id barang berurutan mulai dari 1 (counter)
let currentRow = null;



/* ======================
   CREATE (alur nomor 2)
====================== */

document.getElementById("btnSubmit").addEventListener("click", function () {

    const form = document.getElementById("formBarang");
    const btn = this;

    /* validasi HTML5 */

    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }

    /* spinner */

    btn.innerHTML = '<span class="spinner"></span>Loading...';
    btn.disabled = true;

    setTimeout(function () {

        const nama = document.getElementById("nama").value;
        const harga = document.getElementById("harga").value;

        const table = document.querySelector("#tableBarang tbody");

        const row = table.insertRow();

        row.insertCell(0).innerHTML = id++; //counter id barang setelah ditampilkan (row bertambah) baru id bertambah
        row.insertCell(1).innerHTML = nama;
        row.insertCell(2).innerHTML = harga;

        /* klik row buka modal */

        row.onclick = function () {

            currentRow = this;

            document.getElementById("editId").value =
                this.cells[0].innerHTML;

            document.getElementById("editNama").value =
                this.cells[1].innerHTML;

            document.getElementById("editHarga").value =
                this.cells[2].innerHTML;

            document.getElementById("modalEdit").style.display = "block";

        };

        /* reset input */

        document.getElementById("nama").value = "";
        document.getElementById("harga").value = "";

        /* reset button */

        btn.innerHTML = "submit";
        btn.disabled = false;

    }, 600);

});



/* ======================
   UPDATE DATA
====================== */

document.getElementById("btnUpdate").addEventListener("click", function () {

    const form = document.getElementById("formEdit");
    const btn = this;

    if (!form.checkValidity()) { //validasi HTML5 (required)
        form.reportValidity();
        return;
    }

    btn.innerHTML = '<span class="spinner"></span>Loading...';
    btn.disabled = true;

    setTimeout(function () {

        currentRow.cells[1].innerHTML =
            document.getElementById("editNama").value;

        currentRow.cells[2].innerHTML =
            document.getElementById("editHarga").value;

        document.getElementById("modalEdit").style.display = "none";

        btn.innerHTML = "Ubah";
        btn.disabled = false;

    }, 500);

});



/* ======================
   DELETE DATA
====================== */

document.getElementById("btnDelete").addEventListener("click", function () {

    const btn = this;

    btn.innerHTML = '<span class="spinner"></span>Loading...';
    btn.disabled = true;

    setTimeout(function () {

        currentRow.remove();

        document.getElementById("modalEdit").style.display = "none";

        btn.innerHTML = "Hapus";
        btn.disabled = false;

    }, 500);

});

</script>


</body>
</html>