<template>
    <div class="card mt-5 col-8 offset-2">
        <div class="alert alert-success" v-if="$page.props.flash.message">
            <strong>{{ $page.props.flash.message }}</strong>
        </div>
        <table class="table table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th class="d-flex justify-content-between">
                        <span>Action</span>
                        <span>
                        <Link href="/customer" class="btn btn-outline-primary">Create</Link>
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer in customers">
                    <td v-text="customer.id"/>
                    <td v-text="customer.name"/>
                    <td v-text="customer.email"/>
                    <td class="text-center">
<!--                        <Link :href="'/customer/'+customer.id+'/edit'" class="btn btn-outline-info">Edit</Link>-->
                        <button @click.prevent="edit(customer.id)" class="btn btn-outline-info">Edit</button>
<!--                        <Link :href="'/customer/'+customer.id+'/destroy'" class="btn btn-outline-primary mx-2">Delete</Link>-->
                        <button @click.prevent="destory(customer.id)" class="btn btn-outline-danger  mx-2">Delete</button>
                        <Link :href="'/customer/'+customer.id+'/delete'" class="btn btn-outline-danger">Delete</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import {Link, router} from '@inertiajs/vue3';
defineProps({
    customers:Object
})

function edit(id){
    router.get('/customer/'+id+'/edit')
}
function destory(id){
    router.get('/customer/'+id+'/destroy')
}

</script>

<style scoped>

</style>
