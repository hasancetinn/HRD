<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create New Order</div>

                    <div class="card-body">
                        <form>

                            <div class="form-group">
                                <label for="order-code">Order Code</label>
                                <input type="text" v-model="orderCode" class="form-control"
                                       id="order-code"
                                       placeholder="Order Code">
                            </div>
                            <div class="form-group">
                                <label for="productId">Product Id</label>
                                <input type="number" v-model="productId" class="form-control"
                                       id="productId"
                                       placeholder="Product Id">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" v-model="quantity" class="form-control"
                                       id="quantity"
                                       placeholder="Quantity">
                            </div>
                            <div class="form-group">
                                <label for="adress">Adress</label>
                                <input type="text" v-model="address" class="form-control" id="adress"
                                       placeholder="Adress">
                            </div>
                            <div class="form-group">
                                <label for="shipping">Shipping</label>
                                <input type="date" v-model="shippingDate" class="form-control"
                                       id="shipping"
                                       placeholder="Shipping">
                            </div>
                            <button type="submit" @click.prevent="saveOrder"
                                    class="btn btn-primary">Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 py-4">
            <div class="card">
                <div class="card-header">All Order</div>

                <div class="card-body">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">OrderCode</th>
                            <th scope="col">Product Id</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Adress</th>
                            <th scope="col">Shipping Date</th>
<!--                            <th>Action</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(order,index) in orders.data" :key="order.id">
                            <th scope="row">{{index + 1}}</th>
                            <td>{{order.orderCode}}</td>
                            <td>{{order.productId}}</td>
                            <td>{{order.quantity}}</td>
                            <td>{{order.address}}</td>
                            <td>{{order.shippingDate}}</td>
<!--                            <td>-->
<!--                                <button type="button" @click="editStudent(student.id)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
<!--                                    Edit-->
<!--                                </button>-->

<!--                                <button type="button" @click="deleteStudent(student.id)" class="btn btn-danger">-->
<!--                                    Delete-->
<!--                                </button>-->
<!--                            </td>-->
                        </tr>
                        </tbody>
                    </table>
                    <pagination :data="orders" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                orders: {},
                id: '',
                orderCode: '',
                productId: '',
                quantity: '',
                address: '',
                shippingDate: '',
            }
        },
        mounted() {
            this.getResults();
            console.log('Component mounted.')
        },
        methods: {
            saveOrder() {
                axios.post('save_order', {
                    orderCode: this.orderCode,
                    productId: this.productId,
                    quantity: this.quantity,
                    address: this.address,
                    shippingDate: this.shippingDate
                })
                    .then(
                        this.productId = '',
                        this.orderCode = '',
                        this.quantity = '',
                        this.adress = '',
                        this.shippingDate = '',
                        this.getResults()
                    );
            },
            getResults(page = 1) {
                axios.get('all_order?page=' + page)
                    .then(response => {
                        console.log(response.data);
                        this.orders = response.data;
                    });
            },
        }
    }
</script>

<style scoped>

</style>