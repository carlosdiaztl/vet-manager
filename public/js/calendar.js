document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        responsive: true,

        locale: "es",
        // esto agrega idioma

        // esto agrega los demas botones como next week etc
        headerToolbar: {
            left: "prev,next,today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,listWeek",
        },
        events: "http://localhost/veterinary-app/public/books/mostrar",
        dateClick: function (info) {
            $("#evento").modal("show");
            console.log("i");

            // formulario.reset();
            // formulario.start.value = info.dateStr;
        },
    });
    calendar.render();
});
// let modal = document.getElementById("evento");
// boton1 = document.getElementsByClassName("fc-listWeek-button");
// console.log(boton1);
// boton1.classList.add("hidden");
// document.addEventListener("click", function ({ target }) {
//     console.log(target);

//     if (target.classList.contains("fc-listWeek-button")) {
//         // target.classList.add("hidden");
//         console.log("yes");
//         // modal.style.display = "block";
//         // $("#evento").modal("show");
//     }
// });
