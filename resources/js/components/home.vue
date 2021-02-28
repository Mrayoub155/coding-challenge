<template>
    <div>
        <div class="container py-5">
            
         <div class="row text-white mb-5">
              <div class="col-lg-7 mx-auto">
            <h1 class="display-9">Add new Product  </h1>
        </div>
             <div class="col-lg-7 mx-auto">
                 <form action="/product/create" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" v-bind:value=" token" />
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control"  name="name" placeholder="Name ">
                    </div>
                   <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input type="file" name="image" class="form-control-file" >
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                 </form>
             </div>
        <div class="col-lg-7 mx-auto">
            <h1 class="display-9 mt-5">Product List</h1>
        </div>
        <div class="col-lg-7 mx-auto">
            <div class="sortList">
                <span>sort by</span>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" @select="sortByName = !sortByName" v-model="sortByName" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Name
                    </label>
                   </div>
                <div class="form-check">
                   <input class="form-check-input" type="checkbox" @select="sortByPrice = !sortByPrice " v-model="sortByPrice" id="flexCheckChecked" checked>
                   <label class="form-check-label" for="flexCheckChecked">
                    Price
                   </label>
                </div>
              </div>
            <div class="sortList">
               
                <span>Filter By Categories</span>
                  <select @change="selectedCategory = $event.target.value">
                      <option value="-1"> --- select ---- </option>
                      <option :value="category.id"  v-for="category in categories" :key="category.id">
                          {{category.name}}
                      </option>
                  </select>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                <!-- list group item-->
                <li class="list-group-item" v-for="product in products" v-bind:key="product.id">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">{{product.name}}</h5>
                            <p class="font-italic text-muted mb-0 small">{{product.description}}</p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">${{product.price}}</h6>
                               
                            </div>
                        </div><img v-bind:src="'storage/'+product.image" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                </li> <!-- End -->
            </ul> <!-- End -->
        </div>
    </div>
</div>
    </div>
</template>
<script>

export default {
  

data()
     {
     return {
         sortByName:false,
         sortByPrice:false,
         products:[],
         categories:[],
         selectedCategory:-1

     } 
     },
     watch:{
      sortByName :  function()
        {
                this.filter();
        } ,
      sortByPrice :  function()
        {
                this.filter();  
        },
        selectedCategory:function()
        {
            this.selectedCategory ==-1 ?
           this.loadData('/products/get') 
            :this.getCategoryProducts(`/categories/get`,this.selectedCategory)
        }
     },
     methods:{

         filter()
         {
           this.loadData(`/products/filtred/?byname=${this.sortByName}&byprice=${this.sortByPrice}`);
      
         },
         loadData(url)
         {
            fetch(url).then(res=> res.json())
           .then(data=>{
               this.products = data
           })
           .catch(err =>console.log(err))
         },
         getCategoriesData(url)
         {
            fetch(url).then(res=> res.json())
           .then(data=>{
               this.categories = data
           })
           .catch(err =>console.log(err))
         },
         getCategoryProducts(url,id)
         {
            
            fetch(url+`/${id}`).then(res=> res.json())
           .then(data=>{
               this.products = data
           })
           .catch(err =>console.log(err))
         },
     },
     created:function()
     {
          this.loadData("/products/get")
          this.getCategoriesData("/categories/get")
     },
     props:{
          token : String
     }
        
        
         
     


}
</script>
<style >
body {
    background: linear-gradient(to right, #c04848, #480048);
    min-height: 100vh
}

.text-gray {
    color: #aaa
}

img {
    height: 170px;
    width: 140px
}
.sortList{
    display: flex;
flex-direction: column;
justify-content: left;
align-items: flex-start;
}
.sortList span{
    color: rgb(200, 200, 200);
}
select{
    width: 200px;
    border-radius: 5px;
    padding-left:5px ;
    font-size: 12pt;
}
</style>