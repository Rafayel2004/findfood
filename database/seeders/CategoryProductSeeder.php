<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        // Clear existing data to avoid duplicates (in correct order)
        Product::truncate();
        Category::truncate();
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        // Create fast food categories
        $burgers = Category::create(['name' => 'Burgers']);
        $chicken = Category::create(['name' => 'Chicken']);
        $sides = Category::create(['name' => 'Sides']);
        $salads = Category::create(['name' => 'Salads']);
        $beverages = Category::create(['name' => 'Beverages']);
        $desserts = Category::create(['name' => 'Desserts']);
        $breakfast = Category::create(['name' => 'Breakfast']);
        
        // Create burger products (8 items)
        Product::create([
            'name' => 'Classic Cheeseburger',
            'category_id' => $burgers->id,
            'price' => 599,
            'description' => 'Juicy beef patty with cheese, lettuce, tomato, and our special sauce',
            'images' => 'products/cheeseburger.jpg'
        ]);
        
        Product::create([
            'name' => 'Bacon BBQ Burger',
            'category_id' => $burgers->id,
            'price' => 799,
            'description' => 'Beef patty with crispy bacon, cheddar cheese, and smoky BBQ sauce',
            'images' => 'products/bbq_burger.jpg'
        ]);
        
        Product::create([
            'name' => 'Double Stack Burger',
            'category_id' => $burgers->id,
            'price' => 899,
            'description' => 'Two beef patties, special sauce, lettuce, cheese, pickles, onions on a sesame seed bun',
            'images' => 'products/double_burger.jpg'
        ]);
        
        Product::create([
            'name' => 'Spicy Jalapeño Burger',
            'category_id' => $burgers->id,
            'price' => 849,
            'description' => 'Beef patty with pepper jack cheese, jalapeños, lettuce, and spicy mayo',
            'images' => 'products/spicy_burger.jpg'
        ]);
        
        Product::create([
            'name' => 'Mushroom Swiss Burger',
            'category_id' => $burgers->id,
            'price' => 899,
            'description' => 'Beef patty with sautéed mushrooms, Swiss cheese, and garlic aioli',
            'images' => 'products/mushroom_burger.jpg'
        ]);
        
        Product::create([
            'name' => 'Veggie Burger',
            'category_id' => $burgers->id,
            'price' => 699,
            'description' => 'Plant-based patty with lettuce, tomato, onion, and special sauce',
            'images' => 'products/veggie_burger.jpg'
        ]);
        
        Product::create([
            'name' => 'Blue Cheese Burger',
            'category_id' => $burgers->id,
            'price' => 949,
            'description' => 'Beef patty with blue cheese crumbles, caramelized onions, and bacon',
            'images' => 'products/blue_cheese_burger.jpg'
        ]);
        
        Product::create([
            'name' => 'Hawaiian Burger',
            'category_id' => $burgers->id,
            'price' => 899,
            'description' => 'Beef patty with grilled pineapple, ham, Swiss cheese, and teriyaki sauce',
            'images' => 'products/hawaiian_burger.jpg'
        ]);
        
        // Create chicken products (7 items)
        Product::create([
            'name' => 'Crispy Chicken Sandwich',
            'category_id' => $chicken->id,
            'price' => 699,
            'description' => 'Crispy breaded chicken breast with mayo, lettuce, and tomato on a brioche bun',
            'images' => 'products/crispy_chicken.jpg'
        ]);
        
        Product::create([
            'name' => 'Grilled Chicken Sandwich',
            'category_id' => $chicken->id,
            'price' => 749,
            'description' => 'Grilled chicken breast with avocado, lettuce, tomato, and honey mustard',
            'images' => 'products/grilled_chicken.jpg'
        ]);
        
        Product::create([
            'name' => 'Chicken Nuggets (6 pcs)',
            'category_id' => $chicken->id,
            'price' => 499,
            'description' => 'Tender white meat chicken nuggets with your choice of dipping sauce',
            'images' => 'products/nuggets.jpg'
        ]);
        
        Product::create([
            'name' => 'Chicken Wings (8 pcs)',
            'category_id' => $chicken->id,
            'price' => 899,
            'description' => 'Crispy chicken wings tossed in your choice of sauce: BBQ, Buffalo, or Honey Garlic',
            'images' => 'products/wings.jpg'
        ]);
        
        Product::create([
            'name' => 'Chicken Caesar Wrap',
            'category_id' => $chicken->id,
            'price' => 799,
            'description' => 'Grilled chicken, romaine lettuce, parmesan cheese, and Caesar dressing in a flour tortilla',
            'images' => 'products/chicken_wrap.jpg'
        ]);
        
        Product::create([
            'name' => 'Spicy Chicken Sandwich',
            'category_id' => $chicken->id,
            'price' => 749,
            'description' => 'Crispy spicy chicken breast with pickles and spicy mayo on a brioche bun',
            'images' => 'products/spicy_chicken.jpg'
        ]);
        
        Product::create([
            'name' => 'Chicken Tenders (5 pcs)',
            'category_id' => $chicken->id,
            'price' => 599,
            'description' => 'Extra crispy chicken tenders with your choice of dipping sauce',
            'images' => 'products/tenders.jpg'
        ]);
        
        // Create sides (6 items)
        Product::create([
            'name' => 'French Fries',
            'category_id' => $sides->id,
            'price' => 299,
            'description' => 'Crispy golden fries with sea salt',
            'images' => 'products/fries.jpg'
        ]);
        
        Product::create([
            'name' => 'Onion Rings',
            'category_id' => $sides->id,
            'price' => 349,
            'description' => 'Crispy battered onion rings',
            'images' => 'products/onion_rings.jpg'
        ]);
        
        Product::create([
            'name' => 'Sweet Potato Fries',
            'category_id' => $sides->id,
            'price' => 399,
            'description' => 'Crispy seasoned sweet potato fries',
            'images' => 'products/sweet_potato_fries.jpg'
        ]);
        
        Product::create([
            'name' => 'Mozzarella Sticks',
            'category_id' => $sides->id,
            'price' => 499,
            'description' => 'Crispy breaded mozzarella sticks with marinara sauce',
            'images' => 'products/mozzarella_sticks.jpg'
        ]);
        
        Product::create([
            'name' => 'Loaded Fries',
            'category_id' => $sides->id,
            'price' => 599,
            'description' => 'Fries topped with cheese, bacon bits, and sour cream',
            'images' => 'products/loaded_fries.jpg'
        ]);
        
        Product::create([
            'name' => 'Chili Cheese Fries',
            'category_id' => $sides->id,
            'price' => 649,
            'description' => 'Fries topped with our signature chili and melted cheese',
            'images' => 'products/chili_fries.jpg'
        ]);
        
        // Create salads (4 items)
        Product::create([
            'name' => 'Caesar Salad',
            'category_id' => $salads->id,
            'price' => 699,
            'description' => 'Crisp romaine lettuce, parmesan cheese, croutons, and Caesar dressing',
            'images' => 'products/caesar_salad.jpg'
        ]);
        
        Product::create([
            'name' => 'Garden Salad',
            'category_id' => $salads->id,
            'price' => 599,
            'description' => 'Mixed greens, tomatoes, cucumbers, carrots, and your choice of dressing',
            'images' => 'products/garden_salad.jpg'
        ]);
        
        Product::create([
            'name' => 'Chicken Caesar Salad',
            'category_id' => $salads->id,
            'price' => 899,
            'description' => 'Caesar salad topped with grilled chicken breast',
            'images' => 'products/chicken_caesar_salad.jpg'
        ]);
        
        Product::create([
            'name' => 'Cobb Salad',
            'category_id' => $salads->id,
            'price' => 999,
            'description' => 'Mixed greens with chicken, bacon, avocado, eggs, tomatoes, and blue cheese',
            'images' => 'products/cobb_salad.jpg'
        ]);
        
        // Create beverages (6 items)
        Product::create([
            'name' => 'Soft Drink',
            'category_id' => $beverages->id,
            'price' => 199,
            'description' => 'Choice of cola, lemon-lime, or orange soda',
            'images' => 'products/soda.jpg'
        ]);
        
        Product::create([
            'name' => 'Milkshake',
            'category_id' => $beverages->id,
            'price' => 399,
            'description' => 'Creamy vanilla, chocolate, or strawberry milkshake',
            'images' => 'products/milkshake.jpg'
        ]);
        
        Product::create([
            'name' => 'Iced Tea',
            'category_id' => $beverages->id,
            'price' => 199,
            'description' => 'Freshly brewed sweetened or unsweetened iced tea',
            'images' => 'products/iced_tea.jpg'
        ]);
        
        Product::create([
            'name' => 'Coffee',
            'category_id' => $beverages->id,
            'price' => 149,
            'description' => 'Freshly brewed hot coffee',
            'images' => 'products/coffee.jpg'
        ]);
        
        Product::create([
            'name' => 'Lemonade',
            'category_id' => $beverages->id,
            'price' => 249,
            'description' => 'Freshly squeezed lemonade',
            'images' => 'products/lemonade.jpg'
        ]);
        
        Product::create([
            'name' => 'Smoothie',
            'category_id' => $beverages->id,
            'price' => 399,
            'description' => 'Choice of mixed berry, mango, or tropical blend',
            'images' => 'products/smoothie.jpg'
        ]);
        
        // Create desserts (5 items)
        Product::create([
            'name' => 'Apple Pie',
            'category_id' => $desserts->id,
            'price' => 249,
            'description' => 'Warm apple pie with flaky crust and cinnamon',
            'images' => 'products/apple_pie.jpg'
        ]);
        
        Product::create([
            'name' => 'Chocolate Chip Cookie',
            'category_id' => $desserts->id,
            'price' => 149,
            'description' => 'Freshly baked chocolate chip cookie',
            'images' => 'products/cookie.jpg'
        ]);
        
        Product::create([
            'name' => 'Ice Cream Sundae',
            'category_id' => $desserts->id,
            'price' => 349,
            'description' => 'Vanilla ice cream with hot fudge, caramel, and whipped cream',
            'images' => 'products/sundae.jpg'
        ]);
        
        Product::create([
            'name' => 'Brownie',
            'category_id' => $desserts->id,
            'price' => 249,
            'description' => 'Rich chocolate brownie served warm with ice cream',
            'images' => 'products/brownie.jpg'
        ]);
        
        Product::create([
            'name' => 'Cheesecake',
            'category_id' => $desserts->id,
            'price' => 399,
            'description' => 'New York style cheesecake with berry compote',
            'images' => 'products/cheesecake.jpg'
        ]);
        
        // Create breakfast items (5 items)
        Product::create([
            'name' => 'Breakfast Sandwich',
            'category_id' => $breakfast->id,
            'price' => 499,
            'description' => 'Egg, cheese, and choice of bacon or sausage on an English muffin',
            'images' => 'products/breakfast_sandwich.jpg'
        ]);
        
        Product::create([
            'name' => 'Pancakes',
            'category_id' => $breakfast->id,
            'price' => 599,
            'description' => 'Fluffy pancakes with butter and maple syrup',
            'images' => 'products/pancakes.jpg'
        ]);
        
        Product::create([
            'name' => 'Hash Browns',
            'category_id' => $breakfast->id,
            'price' => 249,
            'description' => 'Crispy seasoned potato hash browns',
            'images' => 'products/hash_browns.jpg'
        ]);
        
        Product::create([
            'name' => 'Oatmeal',
            'category_id' => $breakfast->id,
            'price' => 349,
            'description' => 'Steel-cut oatmeal with brown sugar, raisins, and nuts',
            'images' => 'products/oatmeal.jpg'
        ]);
        
        Product::create([
            'name' => 'Breakfast Burrito',
            'category_id' => $breakfast->id,
            'price' => 649,
            'description' => 'Scrambled eggs, potatoes, cheese, and choice of meat in a flour tortilla',
            'images' => 'products/burrito.jpg'
        ]);
    }
}