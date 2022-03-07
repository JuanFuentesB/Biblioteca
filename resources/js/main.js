const { swal } = require("sweetalert");

//codigo de vuejs
new Vue ({
    el: '#app_login',
    data:{
        email: '',
        pass: ''
    },
    methods: {
        iniciarsession(){
            axios.post('/iniciar-session', {
                email: this.email,
                pass: this.pass
            }).then( response => {

                if(response){
                    location.reload();
                }
                console.log(response);
                

            }).catch (e =>{
                let error  = e.response.data.errors;
                let mensaje = "error"

                if(error.hasOwnProperty('email')){
                    mensaje = error.email[0];
                }else if (error.hasOwnProperty('pass')){
                    mensaje = error.pass[0];
                }else if(error.hasOwnProperty('login')){
                    mensaje = error.login[0];
                }

                Swal('Error', mensaje, 'error')
                
            });
        }

    }
});

new Vue ({
    el: '#app_registro',
    data:{
        nombre: '',
        email: '',
        password: '',
        password2: '',
        tusuario: ''
    },
    methods:{
        addusuario(){
            axios.post('/agregar-usuario', {
                nombre: this.nombre,
                email: this.email,
                password: this.password,
                password_confirmation: this.password2,
                tusuario: this.tusuario
            }).then( response => {
                this.obtenerlibros();
                Swal("Se agrego correctamente");

            }).catch (e =>{

                let error  = e.response.data.errors;
                let mensaje = "error"
                
                if(error.hasOwnProperty('nombre')){
                    mensaje = error.nombre[0];
                }else if(error.hasOwnProperty('email')){
                    mensaje = error.email[0];
                }else if (error.hasOwnProperty('password')){
                    mensaje = error.password[0];
                }else if(error.hasOwnProperty('login')){
                    mensaje = error.login[0];
                }

                Swal('Error', mensaje, 'error')
                
            });
        }
    }
});

new Vue({
    el: '#app_libros',
    data: {
        libros: [],
        librosPres: [],
        titulo: '',
        autor: '',
        editorial: '',
        ano: '',
        tituloModal: '',
        modal: 0,
        modificar: '',
        id: ''
    },
    methods:{
        obtenerlibros(){
            axios.get('/listLibros').then( response => {
                this.libros = response.data;
            }).catch(e => {
                console.log(e.response);
            });
        },
        eliminarLibro(id){

            Swal({
                title: "Eliminar Libro",
                text: "Seguro que quieres eliminar el libro",
                icon: "warning",
                buttons: ["Cancelar", "Eliminar"],
                dangerMode: true,
            }).then((res) => {
                if (res) {
                    axios.delete('/eliminarLibro/' + id
                    ).then( response => {
                        Swal("Exito", "se elimino el libro", "success");
                        this.obtenerlibros();
                        console.log(this.libros);
                    }).catch(e => {
                        console.log(e.response);
                    });
                }
            })
        },
        addLibro(){

            if(this.id){
                axios.put('/updateLibro', {
                    id: this.id,
                    titulo: this.titulo,
                    autor: this.autor,
                    editorial: this.editorial,
                    ano: this.ano
                }).then( response => {
                    this.cerrarModal();
                    this.obtenerlibros();
                    Swal("Exito", "Se modifico correctamente", "success");
    
                }).catch (e =>{
    
                    let error  = e.response.data.errors;
                    let mensaje = "error"
                    
                    if(error.hasOwnProperty('titulo')){
                        mensaje = error.titulo[0];
                    }else if(error.hasOwnProperty('autor')){
                        mensaje = error.autor[0];
                    }else if (error.hasOwnProperty('editorial')){
                        mensaje = error.editorial[0];
                    }else if(error.hasOwnProperty('ano')){
                        mensaje = error.ano[0];
                    }
    
                    Swal('Error', mensaje, 'error')
                    
                });
                
            }else{
                axios.post('/addLibro', {
                    titulo: this.titulo,
                    autor: this.autor,
                    editorial: this.editorial,
                    ano: this.ano
                }).then( response => {
                    this.cerrarModal();
                    this.obtenerlibros();
                    Swal("Exito", "Se agrego correctamente", "success");
    
                }).catch (e =>{
    
                    let error  = e.response.data.errors;
                    let mensaje = "error"
                    
                    if(error.hasOwnProperty('titulo')){
                        mensaje = error.titulo[0];
                    }else if(error.hasOwnProperty('autor')){
                        mensaje = error.autor[0];
                    }else if (error.hasOwnProperty('editorial')){
                        mensaje = error.editorial[0];
                    }else if(error.hasOwnProperty('ano')){
                        mensaje = error.ano[0];
                    }
                    Swal('Error', mensaje, 'error')
                });
            }
        },
        abrirModal(libro){
            this.modal = 1;

            if(this.modificar){
                this.tituloModal = "Modificar Libro";

                this.id = libro.id,
                this.titulo = libro.titulo,
                this.autor = libro.autor,
                this.editorial = libro.editorial,
                this.ano = libro.ano
            }else {
                this.tituloModal = "Agregar Libro";

                this.id = '',
                this.titulo = '',
                this.autor = '',
                this.editorial = '',
                this.ano = ''
            }
        },
        cerrarModal(){
            this.modal = 0;
        },
        librosPrestados(){
            axios.get('/getlibrosprestados').then( response => {
                this.librosPres = response.data;
            }).catch(e => {
                console.log(e.response);
            });
        }
    },
    mounted(){
        this.obtenerlibros();
    }
});

new Vue ({
    el: '#app_librosPrestados',
    data: {
        mislibros: [],
        Plibros: []
    },
    methods:{
        Mislibros(){
            axios.get('/misLibros').then( response => {
                this.mislibros = response.data;
               console.log(this.mislibros);
            }).catch(e => {
                console.log(e.response);
            });
        },

        devolverLibro(id){
            Swal({
                title: "Regresar Libro",
                text: "Seguro que quieres regresar el libro",
                icon: "warning",
                buttons: ["Cancelar", "Regresar"],
                
            }).then((res) => {
                if (res) {
                    axios.put('/regresarLibro/' + id
                    ).then( response => {
                        Swal("Exito", "regresaste el libro", "success");
                        this.Mislibros();
                        console.log(this.Mislibros);
                    }).catch(e => {
                        console.log(e.response);
                    });
                }
            })
        },

        ListLibros(){
            axios.get('/listarLibros').then( response => {
                this.Plibros = response.data;
               console.log(this.Plibros);
            }).catch(e => {
                console.log(e.response);
            });
        },

        Pedirlibros(id){
            axios.put('/pedirLibro/' + id
            ).then( response => {
                Swal("Exito", "Tienes el libro", "success");
                this.ListLibros();
                this.Mislibros();
                console.log(this.ListLibros);
            }).catch(e => {
                console.log(e.response);
            });
        }

    },
    mounted(){
        this.Mislibros();
    }
})