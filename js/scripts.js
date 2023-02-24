const { createApp } = Vue;

createApp({
    data() {
        return {
            readUrl: './read.php',
            createUrl: './create.php',
            todolist: [],
            newTodo: {
                todo: "",
                complete: false
            }
        };
    },
    methods: {

        finish: function (element) {
            element.complete = !element.complete
        },//finish

        addTodo: function () {
            //Al post del form creiamo una chiamata axios che passa un oggetto che contiene i dati del v-model
            axios
                .post(this.createUrl, {
                    newTodo: this.newTodo,
                }, {
                    headers: {
                        "Content-Type": "multipart/form-data"
                    }//headers

                }).then((response) => {
                    console.log(response);

                    this.todolist.push(
                        {
                            todo: this.newTodo.todo,
                            complete: this.newTodo.complete
                        })//push
                })//response
        }//addTodo
    },
    created() {
        axios
            .get(this.readUrl)
            .then((response) => {
                this.todolist = response.data.todolist;
            });
    }
}).mount('#app');
