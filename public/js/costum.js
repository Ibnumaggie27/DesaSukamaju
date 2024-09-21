
document.addEventListener("DOMContentLoaded", function () {
  // Tampilan Berita
  const iconBansos = document.querySelectorAll(".iconBansos");
  const descElements = document.querySelectorAll('.desc');
  const latestNewsElements = document.getElementById('latest-news');
  const colDetailBerita = document.querySelectorAll(".BeritaDetail");
  const padBerita = document.querySelectorAll(".Berita");
  const padContentDesc = document.querySelectorAll(".content-desc");

  //Tampilan Kepemerintahan
  const iconLembagaDesa = document.querySelectorAll(".iconLembagaDesa");
  const AnggotaLembaga = document.querySelectorAll(".AnggotaLembaga");

  //Tampilan Landing-Page
  var demografiElement = document.getElementById('Demografi');
  const beritaPengumuman = document.querySelector("#BeritaPengumuman");
  const tentangDesa = document.querySelector("#MengenaiDesa");
  const APBDesa = document.querySelector("#Apbdes");
  const penduduk = document.querySelector("#DataKependudukan");

  const angkaJumlahPenduduk = document.querySelectorAll(".card-demografi-penduduk__jumlah");
  const titleJumlahPenduduk = document.querySelectorAll(".card-demografi-penduduk__info");

  const layoutCard = document.querySelectorAll(".layout-card");
  const cardDanaMasuk = document.querySelectorAll(".card-dana-masuk");
  const cardDanaKeluar = document.querySelectorAll(".card-dana-keluar");

  const detailPembelanjaan = document.querySelectorAll(".detailPembelanjaan");

  //Tampilan Dashboard
  const textDashboard = document.querySelectorAll(".textDashboard");
  const textDashboardBottom = document.querySelectorAll(".textDashboardBottom");

  const layoutWelcome = document.querySelectorAll(".layoutWelcome");
  const layoutBaganWelcome = document.querySelectorAll(".layoutBaganWelcome");
  const textheadDash = document.querySelectorAll(".headDash");

  const layoutBtnPengaduan = document.querySelectorAll(".layoutBtnPengaduan")
  const btnPengaduan = document.querySelectorAll(".btnPengaduan")

  //Tampilan header username
  const usernameLargeScreen = document.getElementById("usernameLargeScreen");
  const usernameSmallScreen = document.getElementById("usernameSmallScreen");
  const usernameMoreSmallScreen = document.getElementById("usernameMoreSmallScreen");

  //Tampilan card pada Pengelolaan Data Kependudukan
  const LayoutCardKependudukan = document.querySelectorAll(".LayoutCardKependudukan");
  const layoutInsideCardKependudukan = document.querySelectorAll(".layoutInsideCardKependudukan");
  const iconCardKependudukan = document.querySelectorAll(".iconCardKependudukan");

  // Gambar Visi & Misi large dan small screen
  const imageLargeScreen = document.getElementById("img_Largescreen");
  const imageSmallScreen = document.getElementById("img_Smallscreen");

  //gambar struktur anggota desa pada halaman kepemerintahan
  const cardimgStruktur = document.querySelectorAll(".card-imgStruktur");

  //Layout col pada pembuatan surat online
  const colPembuatanSurat__Online = document.querySelectorAll(".layout__surat");

  //pembuatan layout up button pada mobile dan screen besar
  const btnDown_largeKependudukan = document.getElementById("btn__down_largeKependudukan");
  const btnUP_mobileKependudukan = document.getElementById("btn__up_mobileKependudukan");

  //layout konfirmasi untuk detail pengajuan surat
  const layout__KonfirmasiDesktop = document.querySelectorAll(".layout__Konfirmasi--Desktop");

  // layout btn login pada landing-page
  const layout__btnLogin = document.querySelectorAll(".layout__btnLogin--Desktop");

  // layot content mobile 
  const layout__contentMobile = document.querySelectorAll(".Dashboard__content--layoutMobile");



  // Check viewport width and apply styles accordingly
  function checkViewportWidth() {
    if (window.innerWidth <= 390) {
      applyStylesForMobile__MoreSmall_Screens()
    }
    else if (window.innerWidth <= 450) {
      applyStylesForMobileScreens()
    }
    else if (window.innerWidth <= 1200) {
      applyStylesForSmallerScreens();
    }
    else {
      applyStylesForLargerScreens();
    }
  }

  // Apply styles for smaller screens
  function applyStylesForMobile__MoreSmall_Screens() {
    removeDescElementsForMobile()
    removeLatestNewsElement();
    adjustColumnWidths();
    addContainerClassToElement(demografiElement);
    addContainerClassToElement(beritaPengumuman);
    addContainerClassToElement(tentangDesa);
    removeElement(usernameLargeScreen);
    removeElement(usernameSmallScreen);
    removeElement(imageLargeScreen);
    removeElement(btnDown_largeKependudukan);

    // ... Add more styles for smaller screens if needed
  }
  // Apply styles for smaller screens
  function applyStylesForMobileScreens() {
    removeDescElementsForMobile()
    removeLatestNewsElement();
    adjustColumnWidths();
    addContainerClassToElement(demografiElement);
    addContainerClassToElement(beritaPengumuman);
    addContainerClassToElement(tentangDesa);
    removeElement(usernameLargeScreen);
    removeElement(usernameMoreSmallScreen);
    removeElement(imageLargeScreen);
    removeElement(btnDown_largeKependudukan);

    // ... Add more styles for smaller screens if needed
  }
  // Apply styles for smaller screens
  function applyStylesForSmallerScreens() {
    removeDescElements();
    removeLatestNewsElement();
    adjustColumnWidths();
    addContainerClassToElement(demografiElement);
    addContainerClassToElement(beritaPengumuman);
    addContainerClassToElement(tentangDesa);
    adjustMobile();
    removeElement(usernameSmallScreen);
    removeElement(usernameMoreSmallScreen);
    removeElement(imageSmallScreen);
    removeElement(btnUP_mobileKependudukan);
    // ... Add more styles for smaller screens if needed
  }


  // Apply styles for larger screens
  function applyStylesForLargerScreens() {
    removeElement(imageSmallScreen);
    removeDescElementsForDesktop();
    removeContainerClassFromElement(demografiElement);
    removeElement(btnUP_mobileKependudukan);
  }

  function adjustMobile() {

    // Lembaga dan organisasi untuk tampilan tablet
    iconLembagaDesa.forEach(function (element) {
      element.classList.remove("col-md-8");
      element.classList.add("col-6");
    });
    AnggotaLembaga.forEach(function (element) {
      element.classList.remove("col-md-4");
      element.classList.add("col-6");
    });

  }

  // Remove description elements
  function removeDescElements() {
    //Tampilan Berita
    descElements.forEach(function (element) {
      element.remove();
    });

    padContentDesc.forEach(function (element) {
      element.classList.remove("px-5");
      element.classList.add("px-2");
    });

    padBerita.forEach(function (element) {
      element.classList.add("py-2");
    });


    // Dashboard Tampilan Tablet
    textDashboard.forEach(function (element) {
      element.classList.remove("text-base");
    });
    textDashboardBottom.forEach(function (element) {
      element.classList.remove("text-base");

      element.style.lineHeight = '1rem';
    });

    btnPengaduan.forEach(function (element) {
      element.classList.remove("px-5");
      element.classList.add("px-4");
    });

    //Gambar Struktur Organisasi
    cardimgStruktur.forEach(function (element) {
      element.classList.remove("col-8");
      element.classList.add("col-12");
    });

    //layout Konfirmasi detail pengajuan surat
    layout__KonfirmasiDesktop.forEach(function (element) {
      element.classList.remove("col-6");
    });

    iconBansos.forEach(function (element) {
      element.classList.remove("col-lg-3");
      element.classList.add("col-6");
    });


  }

  function removeDescElementsForMobile() {
    descElements.forEach(function (element) {
      element.remove();
    });

    padContentDesc.forEach(function (element) {
      element.classList.remove("px-5");
      element.classList.add("px-2");
    });


    // Dashboard Tampilan Mobile
    textDashboard.forEach(function (element) {
      element.classList.remove("text-lg");
      element.classList.remove("text-base");

      element.classList.remove("h6")

    });
    textDashboardBottom.forEach(function (element) {
      element.classList.remove("text-base");
      element.classList.add("mt-1");

      element.style.fontSize = '8px';
      element.style.lineHeight = '12px';
    });

    layoutWelcome.forEach(function (element) {
      element.classList.remove("flex");
      element.classList.add("d-block");

      element.classList.remove("py-4");
      element.classList.add("py-5");
      element.classList.add("pt-4");

      element.classList.remove("px-10")
      element.classList.add("px-2")
    });

    layoutBaganWelcome.forEach(function (element) {

      element.classList.remove("px-9");

    });

    layoutBtnPengaduan.forEach(function (element) {

      element.classList.add("float-end");

    });
    btnPengaduan.forEach(function (element) {
      element.classList.remove("px-5");
      element.classList.add("px-3");

      element.style.fontSize = '10px';
    });

    textheadDash.forEach(function (element) {
      element.classList.remove("text-lg");
    });


    //Card dalam halaman kependudukan
    layoutInsideCardKependudukan.forEach(function (element) {
      element.classList.remove("py-3");
      element.classList.add("py-1");
    });
    iconCardKependudukan.forEach(function (element) {
      element.classList.add("p-0");
    });

    //Gambar Struktur Organisasi
    cardimgStruktur.forEach(function (element) {
      element.classList.remove("col-8");
      element.classList.add("col-12");
    });

    // perubahan col dalam pembuatan surat online bagian input
    colPembuatanSurat__Online.forEach(function (element) {
      element.classList.remove("col-md-4");
      element.classList.add("col-md-6");

    });

    //layout Konfirmasi detail pengajuan surat
    layout__KonfirmasiDesktop.forEach(function (element) {
      element.classList.remove("col-6");
    });

    //layout dashboard content mobile
    layout__contentMobile.forEach(function (element) {
      element.classList.remove("px-10");
    });

    iconBansos.forEach(function (element) {
      element.classList.remove("col-lg-3");
      element.classList.add("col-6");
    });

  }
  function removeDescElementsForDesktop() {

    layout__btnLogin.forEach(function (element) {
      element.classList.add("d-flex ");
      element.classList.add("justify-center ");
      element.classList.add("m-auto");
    });


  }

  // Remove latest news element
  function removeLatestNewsElement() {
    if (latestNewsElements) {
      latestNewsElements.remove();
    }
  }

  function removeElement(element) {
    if (element) {
      element.remove();
    }
  }

  // Adjust column widths for various elements
  function adjustColumnWidths() {
    colDetailBerita.forEach(function (element) {
      element.classList.remove("col-8");
      element.classList.add("col-12");
    });

    LayoutCardKependudukan.forEach(function (element) {
      element.classList.remove("col-4")
      element.classList.add("col-md-6")
    });
  }

  // Add 'container' class to an element
  function addContainerClassToElement(element) {
    if (element) {
      element.classList.add('container');
    }
  }

  // Remove 'container' class from an element
  function removeContainerClassFromElement(element) {
    if (element) {
      element.classList.remove('container');
    }
  }

  // Event listener for viewport width changes
  window.addEventListener("resize", checkViewportWidth);

  // Initial check on page load
  checkViewportWidth();
});




document.addEventListener("DOMContentLoaded", function () {
  var root1 = am5.Root.new("apbdes");

  // Set themes
  root1.setThemes([
    am5themes_Animated.new(root1)
  ]);

  // Create first chart (Pie Chart)
  var chart1 = root1.container.children.push(
    am5percent.PieChart.new(root1, {
      endAngle: 270
    })
  );

  // Create series for the first chart
  var series1 = chart1.series.push(
    am5percent.PieSeries.new(root1, {
      valueField: "pengeluaran",
      categoryField: "judulPengeluaran",
      endAngle: 270
    })
  );

  series1.states.create("hidden", {
    endAngle: -90
  });
  var subsetData = chartBeranda.slice(1);
  series1.data.setAll(subsetData);
  series1.appear(1000, 100);
});

document.addEventListener("DOMContentLoaded", function () {
  am4core.useTheme(am4themes_animated);

  // Create chart instance
  var chart = am4core.create("apbdesTahunan", am4charts.XYChart);

  // Mengambil data dari server
  chart.data = chartData;

  // Create axes
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "tahun";
  categoryAxis.title.text = "Pemasukan Dan Pengeluaran Desa Palasari";
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.minGridDistance = 20;
  categoryAxis.renderer.cellStartLocation = 0.1;
  categoryAxis.renderer.cellEndLocation = 0.9;

  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.min = 0;
  valueAxis.title.text = "Pengeluaran";

  // Create series
  function createSeries(field, name, stacked, color) {
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.dataFields.valueY = field;
  series.dataFields.categoryX = "tahun";
  series.name = name;
  series.columns.template.tooltipText = "{name}: [bold]{valueY}[/]";
  series.stacked = stacked;
  series.columns.template.width = am4core.percent(95);
  series.columns.template.stroke = am4core.color(color); // Set column stroke color
  series.columns.template.fill = am4core.color(color); // Set column fill color
}

createSeries("anggaran", "Anggaran", false, "#2f9e44");
createSeries("jumlah", "Pengeluaran", false,  "#e03131");
  // Add legend
  chart.legend = new am4charts.Legend();
});

function formatDate(date) {
  const options = {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  };
  return date.toLocaleDateString('en-US', options);
}

function deleteConfirmation(url, id, nama) {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    }
  });

  swal.fire({
    title: "Hapus?",
    icon: "warning",
    html: `
Anda akan menghapus data<b> ` + nama + `</b> !?
`,

    showCancelButton: !0,
    confirmButtonText: "Ya, lakukan!",
    cancelButtonText: "Tidak, batalkan!",
    reverseButtons: !0
  }).then(function (e) {

    if (e.value === true) {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        type: 'POST',
        url: "/data/" + url + "/delete/" + id,
        data: {
          _token: CSRF_TOKEN
        },
        dataType: 'JSON',
        success: function (results) {
          if (results.success === true) {
            Toast.fire("Done!", results.massage, "success");

            setTimeout(function () {
              location.reload();
            }, 1500);
          } else {
            Toast.fire("Error!", results.message, "error");
          }
        }
      });

    } else {
      e.dismiss;
    }
  }, function (dismiss) {
    return false;
  });
}

function openDetailBlade(url, id) {
  window.location.href = '/data/' + url + '/detail/' + id;
}

function rejectConfirmation(id) {
  Swal.fire({
    title: 'Anda yakin ingin menolak pengajuan surat ini?',
    text: "Tindakan ini tidak dapat dikembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, tolak!',
    cancelButtonText: 'Batalkan'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('rejectForm' + id).submit();
    }
  })
}

function verifyConfirmation(id) {
  Swal.fire({
    title: 'Anda yakin ingin memverifikasi pengajuan surat ini?',
    text: "Tindakan ini tidak dapat dikembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#ffc107',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, verifikasi!',
    cancelButtonText: 'Batalkan'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('verifyForm' + id).submit();
    }
  })
}