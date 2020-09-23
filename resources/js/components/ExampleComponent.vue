<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create new student</div>

                    <div class="card-body">
                    <form>
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control " :class="{' border-danger':errors.name}" id="name" v-model="name" aria-describedby="name" placeholder="Enter name" required>
                        <small v-if="errors.name" class="text-danger">{{errors.name[0]}}</small>
                        </div>


                        <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" v-model="email" class="form-control " :class="{' border-danger':errors.email}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small v-if="errors.email" class="text-danger">{{errors.email[0]}}</small>

                        </div>
                        <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" v-model="phone" class="form-control " :class="{' border-danger':errors.phone}" id="phone" placeholder="phone" required>
                        <small v-if="errors.phone" class="text-danger">{{errors.phone[0]}}</small>

                        </div>

                        <button type="submit"  class="btn btn-primary"  @click.prevent="swalSave">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                students: {},
                id:'',
                name: '',
                email: '',
                phone: '',
                editname: '',
                editemail: '',
                editphone: '',
                errors: {},
                searchQuery: '',
                temp: ''
            }
        },
        mounted() {
            console.log('Create Student')
        },
        methods:{
            swalSave(){
                Swal.fire({
                  title: 'Do you want to save this student?',
                  text: "you can update informations later!",
                  icon: 'success',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                  if (result.value) {
                      this.saveStudent();
                  }
                })
            },
            saveStudent(){
                this.errors=''
                axios.post('insert',{

                    name:this.name,
                    email:this.email,
                    phone:this.phone
                })
                .catch((error) => this.errors = error.response.data.errors)
                .then(response => {
                    this.name  ='',
                    this.email ='',
                    this.phone =''

                    if(this.errors.name || this.errors.email || this.errors.phone){
                        toastr.error('Students information could not be Saved.', 'Failed!', {timeOut: 5000});
                    }
                    else{
                        toastr.success('Students information Saved.', 'Success!', {timeOut: 5000});
                    }
                });
            }
        }
    }
</script>
