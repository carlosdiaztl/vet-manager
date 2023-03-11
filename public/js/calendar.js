document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",

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
// document.addEventListener("click", function ({ target }) {
//     console.log(target);
//     console.log(target.id);

//     if (target.id.includes("fc-dom")) {
//         console.log("yes");
//         modal.style.display = "block";
//         // $("#evento").modal("show");
//     }
// });
