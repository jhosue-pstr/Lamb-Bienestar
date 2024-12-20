<x-app-layout>

    <div class="cookieContainer">
        <div class="cookieCard">
            <p class="cookieHeading">Atenciones.</p>
            <p class="cookieDescription">By using this website you automatically accept that we use cookies. <a
                    href="#">What for?</a></p>
            <button class="acceptButton">Understood</button>
        </div>

        <div class="cookieCard">
            <p class="cookieHeading">Solicitudes.</p>
            <p class="cookieDescription">By using this website you automatically accept that we use cookies. <a
                    href="#">What for?</a></p>
            <button class="acceptButton">Understood</button>
        </div>

        <div class="cookieCard">
            <p class="cookieHeading">Seguimiento Estudiantes.</p>
            <p class="cookieDescription">By using this website you automatically accept that we use cookies. <a
                    href="#">What for?</a></p>
            <button class="acceptButton">Understood</button>
        </div>

        <div class="cookieCard">
            <p class="cookieHeading">Eventos.</p>
            <p class="cookieDescription">By using this website you automatically accept that we use cookies. <a
                    href="#">What for?</a></p>
            <button class="acceptButton">Understood</button>
        </div>
    </div>

</x-app-layout>

<style>
    .cookieContainer {
        display: flex;
        flex-wrap: wrap;

        gap: 20px;
        justify-content: flex-start;
    }

    .cookieCard {
        width: 300px;
        /* Ancho fijo */
        height: 200px;
        /* Alto fijo */
        background: linear-gradient(to right, rgb(137, 104, 255), rgb(175, 152, 255));
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }

    .cookieCard::before {
        width: 150px;
        height: 150px;
        content: "";
        background: linear-gradient(to right, rgb(142, 110, 255), rgb(208, 195, 255));
        position: absolute;
        z-index: 1;
        border-radius: 50%;
        right: -25%;
        top: -25%;
    }

    .cookieHeading {
        font-size: 1.5em;
        font-weight: 600;
        color: rgb(241, 241, 241);
        z-index: 2;
    }

    .cookieDescription {
        font-size: 0.9em;
        color: rgb(241, 241, 241);
        z-index: 2;
    }

    .cookieDescription a {
        color: rgb(241, 241, 241);
    }

    .acceptButton {
        padding: 11px 20px;
        background-color: #7b57ff;
        transition-duration: .2s;
        border: none;
        color: rgb(241, 241, 241);
        cursor: pointer;
        font-weight: 600;
        z-index: 2;
    }

    .acceptButton:hover {
        background-color: #714aff;
        transition-duration: .2s;
    }
</style>
