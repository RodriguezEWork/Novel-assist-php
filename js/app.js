$(document).ready(function () {

    var comprobante = false;
    var Respaldo = $('.content').html();
    var idNovela;
    var utterance = new SpeechSynthesisUtterance();

    function loadVoices() {
        function setSpeech() {
            return new Promise(
                function (resolve, reject) {
                    let synth = window.speechSynthesis;
                    let id;

                    id = setInterval(() => {
                        if (synth.getVoices().length !== 0) {
                            resolve(synth.getVoices());
                            clearInterval(id);
                        }
                    }, 10);
                }
            )
        }

        var lenguaje = $('#voz').val();
        var volumen = $('#volumen').val();

        let s = setSpeech();
        s.then((voices) => {
            utterance.voice = voices[voices.findIndex(a => a.lang == lenguaje)];
            utterance.lang = lenguaje;
            utterance.volume = volumen;
            utterance.voiceURI = "native";
        });
    }

    $(document).on("click", ".carta", function () {

        let fila = $(this).closest("div");
        let imagen = (fila.find('.Portada-Novel').attr('src'));
        let id = parseInt(fila.find('p').text());
        let nombre = (fila.find('#Titulo-novela').text());

        idNovela = id;

        $('#imagen-wave').attr('src', imagen);
        $('#titulo-wave').text(nombre);

        var parametros = {
            id: id
        }

        $.ajax({
            data: parametros,
            url: '/Controller/getCapitulos.php',
            type: 'POST',
            success: function (response) {
                $('#lista').html(response)
            },

        })

    });

    $(document).on("click", ".songItem", function () {

        let fila = $(this).closest("li");
        let id = parseInt(fila.find('.numero-cap').text());
        loadVoices();
        speaking(id);
    });

    function speaking(id) {

        let Newid = $('.numero-cap').filter(function () {
            return $(this).text() == id;
        });
        let fila = Newid.closest("li");

        const capitulo = {
            id: parseInt(fila.find('.id').text()),
            numero: parseInt(fila.find('span').text()),
            titulo: (fila.find('.titulo').text()),
            capitulo: (fila.find('.capitulo').text()),
            marcado: (fila.find('.subtitle').text()),
            id_Novelas: parseInt(fila.find('.id_novela').text()),
        };

        utterance.text = capitulo.titulo + capitulo.numero + 'contenido: \n\n\n' + capitulo.capitulo;
        // utterance.voice = voicesAvailable[219];
        // utterance.lang = voicesAvailable[219];
        utterance.rate = 1.4;
        utterance.pitch = 1.4;

        utterance.onstart = function () {
            comprobante = false;
            let idcapitulo = capitulo.numero;
            registro(idcapitulo);
        };

        utterance.onend = function () {
            if (!comprobante) {
                let idcapitulo = capitulo.numero;
                let idmarcado = capitulo.id;
                NovelaActual = idNovela;

                idcapitulo++;

                marcado(idmarcado);
                speaking(idcapitulo);
            }
        };

        window.speechSynthesis.speak(utterance);
    }

    $(document).on("click", ".bi-pause-fill", function () {
        window.speechSynthesis.pause();
    });

    $(document).on("click", ".bi-play-fill", function () {
        window.speechSynthesis.resume();
    });

    $(document).on("click", ".bi-stop-fill", function () {
        window.speechSynthesis.cancel();
        comprobante = true;
    });

    function registro($capitulo) {

        let capituloId = $capitulo;

        let registroNumerico = document.querySelector('#registro');

        registroNumerico.innerText = 'Capitulo: ' + capituloId;

    };

    function marcado($id) {

        const id = {
            id: $id
        };

        $.ajax({
            type: 'POST',
            url: '/Controller/setMarca.php',
            data: id,
            success: function (response) {
                console.log(response)
            }
        });

    };

    $('#search').keyup(function (e) {

        if ($('#search').val()) {

            const $id = $('#search').val();

            const id = {
                id: $id
            };

            $.post('/Controller/getSearch.php', id, function (response) {
                $('.content').html(response);
            })

        } else {

            $('.content').html(Respaldo);

        }

    });

    $('#subir-form').submit(function (e) {
        e.preventDefault();
        const postData = {
            numero: $('#numero').val(),
            tituloCap: $('#tituloCap').val(),
            id_novelas: idNovela,
            capitulo: $('#capitulo').val()
        };
        $.post('/Controller/setCapitulo.php', postData, function (response) {
            console.log(response)
            $('#subir-form').trigger('reset');
        })
    });

});