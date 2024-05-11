var meals = [
    {name: 'Grilled Chicken Salad', price: '₹499',image: 'grilledchk.jpg'},
    {name: 'Quinoa and Black Beans', price: '₹398',image: 'quinoa.jpg'},
    {name: 'Baked Salmon with Vegetables', price: '₹515',image: 'bakedsalmon.jpg'},
    {name: 'Vegetable Stir Fry', price: '₹385',image: 'vegstirfry.jpg'},
    {name: 'Greek Yogurt with Berries', price: '₹435',image: 'greek.jpg'},
    {name: 'Avocado Toast', price: '₹206',image: 'avacado.jpg'}
];

var mealsDiv = document.getElementById('meals');

for (var i = 0; i < meals.length; i++) {
    var mealDiv = document.createElement('div');
    mealDiv.className = 'meal';
    mealDiv.innerHTML = '<h2 class="m1">' + meals[i].name +'<br><img src="img/' + meals[i].image + '" alt= "' + meals[i].name +'"'+ '</h2><p>Price: ' + meals[i].price + '</p><button>Order Now</button>';
    mealsDiv.appendChild(mealDiv);
}