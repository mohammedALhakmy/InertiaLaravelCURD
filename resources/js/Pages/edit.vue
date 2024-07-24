<template>
    <div class="card  mt-5  col-6 offset-3 m-auto">
        <div class="card-header">
            Create Customer
        </div>
        <div class="card-body">
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" value="customers.email" v-model="form.email">
                    <span v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1  text-danger"></span>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" v-model="form.phone" class="form-control" id="phone">
                    <span v-if="form.errors.phone" v-text="form.errors.phone" class="text-red-500 text-xs mt-1 text-danger"></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" v-model="form.name" class="form-control" id="name">
                    <span v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1 text-danger"></span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm} from "@inertiajs/vue3";
import {router} from "@inertiajs/vue3";
const props = defineProps({
    customers: Object,
});

const form = useForm({
    name: props.customers.name,
    email: props.customers.email,
    phone: props.customers.phone,
});

function submit() {
    form.put(`/customer/${props.customers.id}`, {
        onError: (errors) => {
            console.log(errors);
        },
    });
}
</script>

<style scoped>

</style>
