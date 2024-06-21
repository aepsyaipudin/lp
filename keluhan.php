<?php
    require_once "header.php";
?>

<div id="wrapFormPesan">
    <div id="pesanTittle">
        <h1>Keluhan</h1>
    </div>
    <form>
        <div class="formPesan">
        <input type="text" id="nama" placeholder="Nama" />
        </div>
        <div class="formPesan">
            <input  type="text" id="email" placeholder="Email" />
        </div>
        <div id="formBoxPesan">
            <textarea row="10" cols="50" id="pesan"  ></textarea>
        </div>
        <div class="saveData">
                <input type="button" class="btnSave" value="KIRIM" onclick="kirimPesan()" />
        </div>
    </form>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
    integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="main.js"></script>

</html>
