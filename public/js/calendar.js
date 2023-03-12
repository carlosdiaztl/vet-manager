document.addEventListener("DOMContentLoaded", function () {
    let formulario = document.getElementById("form1");
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
        // eventDataTransform: function (eventData) {
        //     var extendedProps = eventData.extendedProps;
        //     eventData.title = extendedProps.petName;
        //     eventData.description = extendedProps.type;
        //     eventData.user_id = extendedProps.user_id;
        //     eventData.date_end = extendedProps.date_end;
        //     return eventData;
        // },
        dateClick: function (info) {
            formulario.reset();
            formulario.start.value = info.dateStr;

            // formulario.id.title = info.dateStr;
        },
        eventClick: function (info) {
            var extendedProps = info.event.extendedProps;
            console.log(extendedProps);
            // document.getElementById("user_id").value = extendedProps.user_id;
            document.getElementById("petName").value = extendedProps.petName;
            document.getElementById("date_end").value = extendedProps.date_end;
            document.getElementById("type").value = extendedProps.type;
            document.getElementById("usuario").value = extendedProps.user.name;
            document.getElementById("email").value = extendedProps.user.email;
            document.getElementById("phone").value = extendedProps.user.number;
            document.getElementById("start").value =
                info.event.start.toLocaleTimeString();

            document.getElementById("identificacion").value =
                extendedProps.user.identification;
            console.log(extendedProps.user.name);
            console.log(extendedProps.user.email);
            console.log(info.event.start.toLocaleTimeString());

            // alert(`${extendedProps.type}, ${extendedProps.petName}`);
            $("#evento").modal("show");
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
