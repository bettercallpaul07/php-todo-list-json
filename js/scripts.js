const { createApp } = Vue;

createApp({
    data() {
        return {
            readUrl: './read.php',
            createUrl: './create.php',
            todolist: [],
            newTodo: {
                todoTxt: "",
                complete: false,
            },
        };
    },
    methods: {
        finish: function (element) {
            element.complete = !element.complete
        },
        addTodo() {
            //Al post del form creiamo una chiamata axios (tramite array associativo)  che passa un oggetto con chiave che contiene il dato del v-model
            axios.post(this.createUrl, {
                todo: this.newTodo
            }, {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            }).then((response) => {
                console.log(response);

                this.todolist.push({
                    todo: this.todoTxt

                })
            }
            )
        }
    },
    created() {
        axios
            .get(this.readUrl)
            .then((response) => {
                this.todolist = response.data.todolist;
            });
    }
}).mount('#app');
