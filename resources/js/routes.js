let login = require('./components/auth/login').default;
let register = require('./components/auth/register').default;
let forget = require('./components/auth/forget').default;
let logout = require('./components/auth/logout').default;
//end auth-- ---

//employee
let createEmployee = require('./components/employee/create').default;
let employees = require('./components/employee/index').default;
let employeesedit = require('./components/employee/edit').default;

//employee
let createsuppliers = require('./components/suppliers/create').default;
let suppliers = require('./components/suppliers/index').default;
let suppliersedit = require('./components/suppliers/edit').default;


//Category
let createCategory = require('./components/category/create').default;
let Category = require('./components/category/index').default;
let Categoryedit = require('./components/category/edit').default;


//Products
let createProduct = require('./components/product/create').default;
let Product = require('./components/product/index').default;
let Productedit = require('./components/product/edit').default;
let stock = require('./components/stock/index').default;
let stockedit = require('./components/stock/edit').default;


//expens
let createexpens = require('./components/expens/create').default;
let expens = require('./components/expens/index').default;
let expensedit = require('./components/expens/edit').default;



//expens
let salarypay = require('./components/salary/allemp').default;
let paysalary = require('./components/salary/create').default;
let salary = require('./components/salary/index').default;
let viewsalary = require('./components/salary/viewsalary').default;


//Customer
let createCustomer = require('./components/customer/create').default;
let customer = require('./components/customer/index').default;
let customeredit = require('./components/customer/edit').default;

//orders
let todayorder = require('./components/order/order').default;
let allorder = require('./components/order/allorder').default;
let vieworder = require('./components/order/view').default;


//POS
let pos = require('./components/pos/index').default;


// dashboard
let home = require('./components/home').default;

export const routes=[

    {path: '/',component:login,name: 'login'},
    {path: '/register',component:register,name: 'register'},
    {path: '/forget',component:forget,name: 'forget'},
    {path: '/logout',component:logout,name: 'logout'},
    //auth end
    //dashboard
    {path: '/dashboard',component:home,name: 'dashboard'},

    //employee
    {path: '/employee/create',component:createEmployee,name: 'createemployee'},
    {path: '/employee/edit/:id',component:employeesedit,name: 'editemployee'},
    {path: '/employees',component:employees,name: 'employees'},

    // suppliers:
    {path: '/supplier/create',component:createsuppliers,name: 'createsuppliers'},
    {path: '/supplier/edit/:id',component:suppliersedit,name: 'suppliersedit'},
    {path: '/suppliers',component:suppliers,name: 'suppliers'},

     // Category:
     {path: '/category/create',component:createCategory,name: 'createCategory'},
     {path: '/category/edit/:id',component:Categoryedit,name: 'Categoryedit'},
     {path: '/category',component:Category,name: 'Category'},


    // Products:
    {path: '/product/create',component:createProduct,name: 'createProduct'},
    {path: '/product/edit/:id',component:Productedit,name: 'Productedit'},
    {path: '/product',component:Product,name: 'Product'},
    {path: '/product/stock',component:stock,name: 'stock'},  // product stock
    {path: '/stock/edit/:id',component:stockedit,name: 'stockedit'},  // product stock edit


    // Expens:
    {path: '/expens/create',component:createexpens,name: 'createexpens'},
    {path: '/expens/edit/:id',component:expensedit,name: 'expensedit'},
    {path: '/expens',component:expens,name: 'expens'},

     // Salaries:
     {path: '/salary/pay',component:salarypay,name: 'salarypay'},
     {path: '/salary/pay/:id',component:paysalary,name: 'paysalary'},
     {path: '/salary/view/:id',component:viewsalary,name: 'viewsalary'},
    {path: '/salary',component:salary,name: 'salary'},

      // Customer:
      {path: '/customer/create',component:createCustomer,name: 'createCustomer'},
      {path: '/customer/edit/:id',component:customeredit,name: 'customeredit'},
      {path: '/customer',component:customer,name: 'customer'},


      //pos
      {path: '/pos',component:pos,name: 'pos'},

      //orders
      {path: '/orders',component:todayorder,name: 'todayorder'},
      {path: '/orders/all',component:allorder,name: 'allorder'},
      {path: '/order/view/:id',component:vieworder,name: 'vieworder'},



]
