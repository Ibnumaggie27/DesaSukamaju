function openSidebar() {
    document.querySelector(".sidebar").classList.toggle("hidden");
}

function previewImage() {
    const inputImage = document.querySelector("#lampiran");
    const previewImage = document.querySelector(".previewImage");

    previewImage.classList.add("block");

    const oFReader = new FileReader();
    oFReader.readAsDataURL(inputImage.files[0]);
    oFReader.onload = function (oFRevent) {
        previewImage.src = oFRevent.target.result;
    };
}

const alertBtn = document.querySelectorAll(".closealertbutton");
alertBtn.forEach((btn) => {
    const pid = btn.parentElement;
    btn.addEventListener("click", () => {
        pid.classList.toggle("hidden");
    });

    setTimeout(() => {
        pid.classList.toggle("hidden");
    }, 5000);
});

var openDetail = document.querySelectorAll(".openDetail");
var closeDialogDetail = document.getElementById("closeDialogDetail");
var overlay = document.getElementById("overlay");
var dialogDetail = document.getElementById("dialogDetail");
var dialogEdit = document.getElementById("dialogEdit");
var modalKependudukan = document.getElementById("modalKependudukan");
var modalBuatSurat = document.getElementById("modalBuatSurat");
var body = document.querySelector(".dialog-body");
var bodyEdit = document.querySelector(".dialog-body-edit");

openDetail.forEach((o) => {
    o.addEventListener("click", () => {
        overlay.classList.remove("hidden");
        dialogDetail.classList.remove("hidden");
        body.innerHTML = `
            <div class="flex">
                <div class="font-semibold text-sm uppercase text-danger mr-8 [&>p]:mb-5">
                    <p>Nama</p>
                    ${o.dataset.username ? `<p>Username</p>` : ``}
                    <p>Telepon</p>
                    <p>Role</p>
                </div>
                <div class="[&>p]:mb-5 text-dark text-sm">
                    <p>${o.dataset.nama}</p>
                    ${o.dataset.username ? `<p>${o.dataset.username}</p>` : ``}
                    <p>${o.dataset.telepon}</p>
                    <p class="capitalize">${o.dataset.level}</p>
                </div>
            </div>
        `;
    });
});

closeDialogDetail.addEventListener("click", () => {
    dialogDetail.classList.add("hidden");
    overlay.classList.add("hidden");
});

var deleteBtn = document.querySelectorAll(".deleteBtn");
var dialogDelete = document.getElementById("dialogDelete");

var closeDialogDelete = document.getElementById("closeDialogDelete");
var closeDialogSurat = document.getElementById("closeDialogSurat");
const formDelete = document.querySelector("#formDelete");


var closeDialogPenduduk = document.getElementById("closeDialogPenduduk");
var dialogDeletePenduduk = document.getElementById("dialogDeletePenduduk");
const formDeletePenduduk = document.querySelector("#formDeletePenduduk");

deleteBtn.forEach((o) => {
    o.addEventListener("click", () => {
        overlay.classList.remove("hidden");
        dialogDelete.classList.remove("hidden");
        formDelete.setAttribute("action", "/masyarakat/" + o.dataset.id);
    });
});

var deletePengaduan = document.querySelectorAll(".deletePengaduan");
deletePengaduan.forEach((o) => {
    o.addEventListener("click", () => {
        overlay.classList.remove("hidden");
        dialogDelete.classList.remove("hidden");
        formDelete.setAttribute("action", "/pengaduan/" + o.dataset.id);
    });
});

var deleteTanggapan = document.querySelectorAll(".deleteTanggapan");
deleteTanggapan.forEach((o) => {
    o.addEventListener("click", () => {
        overlay.classList.remove("hidden");
        dialogDelete.classList.remove("hidden");
        formDelete.setAttribute("action", "/tanggapan/" + o.dataset.id);
    });
});

var deletePengguna = document.querySelectorAll(".deletePengguna");
deletePengguna.forEach((o) => {
    o.addEventListener("click", () => {
        overlay.classList.remove("hidden");
        dialogDelete.classList.remove("hidden");
        formDelete.setAttribute("action", "/pengguna/" + o.dataset.id);
    });
});

var deletePenduduk = document.querySelectorAll(".deletePenduduk");
deletePenduduk.forEach((o) => {
    o.addEventListener("click", () => {
        overlay.classList.remove("hidden");
        dialogDeletePenduduk.classList.remove("hidden");
        formDeletePenduduk.setAttribute("action", "/penduduk/" + o.dataset.id);
    });
});

var editPengguna = document.querySelectorAll(".editPengguna");

var username = document.getElementById("username");
var nama = document.getElementById("nama");
var telepon = document.getElementById("telepon");
var password = document.getElementById("password");
var admin = document.getElementById("role-admin");
var petugas = document.getElementById("role-petugas");
var masyarakat = document.getElementById("role-masyarakat");
var formEdit = document.getElementById("formEditPengguna");

editPengguna.forEach((o) => {
    o.addEventListener("click", () => {
        overlay.classList.remove("hidden");
        dialogEdit.classList.remove("hidden");

        const data = JSON.parse(`${o.dataset.user}`);
        username.setAttribute("value", data.username);
        nama.setAttribute("value", data.nama);
        telepon.setAttribute("value", data.telepon);
        password.setAttribute("value", data.password);

        formEdit.setAttribute("action", "/pengguna/" + data.id);

        console.log(data)
        if (data.level == "admin") {
            admin.selected = true;
            console.log('admin')
        } else if (data.level == "petugas") {
            console.log('petugas')
            petugas.selected = true;
        } else {
            console.log('masyarakat')
            masyarakat.selected = true;
        }
    });
});

closeDialogEdit.addEventListener("click", () => {
    dialogEdit.classList.add("hidden");
    overlay.classList.add("hidden");
});

var detailKependudukan = document.querySelectorAll(".detailKependudukan");

var noKK = document.getElementById("noKK");
var nama = document.getElementById("nama");
var telepon = document.getElementById("telepon");
var password = document.getElementById("password");
var admin = document.getElementById("role-admin");
var petugas = document.getElementById("role-petugas");
var masyarakat = document.getElementById("role-masyarakat");
var formDetailKependudukan = document.getElementById("formDetailKependudukan");

detailKependudukan.forEach((o) => {
    o.addEventListener("click", () => {
        overlay.classList.remove("hidden");
        modalKependudukan.classList.remove("hidden");

        const data = JSON.parse(`${o.dataset.user}`);
        username.setAttribute("value", data.username);
        nama.setAttribute("value", data.nama);
        telepon.setAttribute("value", data.telepon);
        password.setAttribute("value", data.password);

        formDetailKependudukan.setAttribute("action", "/penduduk/" + data.id);

        console.log(data)
        if (data.level == "admin") {
            admin.selected = true;
            console.log('admin')
        } else if (data.level == "petugas") {
            console.log('petugas')
            petugas.selected = true;
        } else {
            console.log('masyarakat')
            masyarakat.selected = true;
        }
    });
});

closeDialogKependudukan.addEventListener("click", () => {
    modalKependudukan.classList.add("hidden");
    overlay.classList.add("hidden");
});

var buatSurat = document.querySelectorAll(".buatSurat");

buatSurat.forEach((o) => {
    o.addEventListener("click", () => {
        overlay.classList.remove("hidden");
        modalBuatSurat.classList.remove("hidden");

    });
});

closeDialogSurat.addEventListener("click", () => {
    modalBuatSurat.classList.add("hidden");
    overlay.classList.add("hidden");
});

closeDialogDelete.addEventListener("click", () => {
    dialogDelete.classList.add("hidden");
    overlay.classList.add("hidden");
});


