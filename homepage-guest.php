<?php include('../navbar/header-guest.php')?>

<!-- Asian groceries -->
<div 
    class='h-auto lg:pb-44 md:pb-56 bg-no-repeat bg-cover bg-center bg-fixed w-full' 
    style="background-image: url('../image/homepage-background.png');"
>
    <h1 class='uppercase text-center md:text-3xl lg:text-5xl pt-52 font-bold font-serif'>asian groceries</h1>
    <div class='flex justify-center my-10 gap-20 text-center'>
        <button class='rounded-3xl pt-3 pb-4 font-bold px-6 lg:text-3xl md:text-xl lg:w-44 md:w-32 bg-black text-white hover:shadow-md transition ease-in hover:bg-white hover:text-black'><a href="./signup.php">Sign up</a></button>
        <button class='rounded-3xl pt-3 pb-4 font-bold px-6 lg:text-3xl md:text-xl lg:w-44 md:w-32 bg-black text-white hover:shadow-md transition ease-in hover:bg-white hover:text-black'><a href="./login.php">Login</a></button>
    </div>
</div>
<!-- Suggestion -->
<div class='lg:flex lg:flex-1 lg:justify-center lg:gap-20 bg-blue-200 h-auto'>
    <div class='lg:m-10 md:ml-0'>
        <div class='lg:flex lg:flex-col lg:mt-10 md:text-center'>
            <h2 class='lg:text-5xl lg:text-right md:text-center md:text-3xl md:pt-10'>
                <div class='md:inline font-serif font-bold'>Exciting items</div> 
                <div class='md:inline lg:block font-serif font-bold'>you won't find </div>
                <div class='md:inline lg-block font-serif font-bold'>elsewhere</div>
            </h2>
        </div>

        <div class='lg:text-right lg:mt-5 md:my-1 md:text-center md:mx-auto'>
            <div class='md:inline lg:block font-serif'>Taste throughfully curated </div>
            <div class='md:inline lg:block font-serif'>and </div>
            <div class='md:inline lg:block font-serif'>delicious food</div>
        </div>

        <div class='mt-10 lg:text-right md:text-center'>
            <button class='bg-black text-white pt-2 pb-3 px-6 rounded-3xl font-bold text-2xl hover:drop-shadow-md transition ease-in hover:bg-white hover:text-black'><a href="./login.php" class="">Start Shopping</a></button>
        </div>
    </div>

    <div class='grid grid-cols-3 mt-20 lg:gap-5 md:gap-6 h-96'>
        <div>
            <img src="../image/hp-item1.png" alt='' class='md:w-36 h-auto md:mx-auto'/>
        </div>
        <div>
            <img src="../image/hp-item2.png" alt='' class='md:w-36 h-auto md:mx-auto'/>
        </div>
        <div>
            <img src="../image/hp-item3.png" alt='' class='md:w-36 h-auto md:mx-auto'/>
        </div>
        <div>
            <img src="../image/hp-item4.png" alt='' class='md:w-36 h-auto md:mx-auto'/>
        </div>
        <div>
            <img src="../image/hp-item5.png" alt='' class='md:w-36 h-auto md:mx-auto'/>
        </div>
        <div>
            <img src="../image/hp-item6.png" alt='' class='md:w-36 h-auto md:mx-auto'/>
        </div>
    </div>
</div>
<!-- Discover -->
<div class='py-10 bg-blue-200'>
    <h1 class='text-center text-5xl italic font-serif font-bold'>Discover</h1>
    <h2 class='text-center text-3xl pt-5 pb-10 font-serif'>our customer reviews</h2>
    <div class='flex flex-col gap-5'>
        <div class='flex flex-1 bg-white ml-10 mr-10 rounded-2xl p-5'>
            <div>
                <img src="../image/hp-item1.png" alt='' class="h-auto w-full my-2"/>
            </div>
            <div class='ml-10 lg:mt-5'>
                <div class='flex flex-1 gap-3'>
                    <div>
                        <img src= "../image/hp-item2.png" alt='' class="w-10 h-auto"/>
                    </div>
                    <div class='text-gray-500'>
                        <p>chibaby123</p>
                        <p>Jul 12, 2022</p>
                    </div>
                </div>
                <div>
                    <p class="font-serif">I drink milk tea often and this tea in particular is so delicious! The tea taste is strong and the sweetness is perfect. Planning to repurchase again, I wish the purchase limit wasn’t 4 because I can’t get enough....</p>
                </div>
            </div>
        </div>
        <div class='flex flex-1 bg-white ml-10 mr-10 rounded-2xl p-5'>
            <div>
                <img src="../image/hp-item1.png" alt='' class="h-auto w-full my-2"/>
            </div>
            <div class='ml-10 lg:mt-5'>
                <div class='flex flex-1 gap-3'>
                    <div>
                        <img src= "../image/hp-item2.png" alt='' class="w-10 h-auto"/>
                    </div>
                    <div class='text-gray-500'>
                        <p>chibaby123</p>
                        <p>Jul 12, 2022</p>
                    </div>
                </div>
                <div>
                    <p class="font-serif">I drink milk tea often and this tea in particular is so delicious! The tea taste is strong and the sweetness is perfect. Planning to repurchase again, I wish the purchase limit wasn’t 4 because I can’t get enough....</p>
                </div>
            </div>
        </div>
        <div class='flex flex-1 bg-white ml-10 mr-10 rounded-2xl p-5'>
            <div>
                <img src="../image/hp-item1.png" alt='' class="h-auto w-full my-2"/>
            </div>
            <div class='ml-10 lg:mt-5'>
                <div class='flex flex-1 gap-3'>
                    <div>
                        <img src= "../image/hp-item2.png" alt='' class="w-10 h-auto"/>
                    </div>
                    <div class='text-gray-500'>
                        <p>chibaby123</p>
                        <p>Jul 12, 2022</p>
                    </div>
                </div>
                <div>
                    <p class="font-serif">I drink milk tea often and this tea in particular is so delicious! The tea taste is strong and the sweetness is perfect. Planning to repurchase again, I wish the purchase limit wasn’t 4 because I can’t get enough....</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQ -->
<div class="bg-blue-200 pb-5">
    <h1 class='text-5xl text-center pt-10 pb-5 italic font-serif font-bold'>F<span class='opacity-20 font-normal hover:opacity-100'>requently</span> A<span class='opacity-20 font-normal hover:opacity-100'>sked</span> Q<span class='opacity-20 font-normal hover:opacity-100'>uestions</span></h1>
    <details class="bg-white rounded shadow group w-3/4 mx-auto lg:my-10 md:my-5 hover:shadow-lg transition ease-in">
        <summary class="list-none flex flex-wrap items-center">
            <h3 class="flex flex-1 lg:p-4 md:p-3 lg:text-xl md:text-base cursor-pointer text-justify font-serif">
                Can I get contactless delivery?
            </h3>
            <div class="flex lg:w-20 md:w-10 items-center justify-center">
                <div class="border-8 border-transparent border-l-gray-600 group-open:rotate-90 transition-transform origin-left"></div>
            </div>
        </summary>
            <p class="p-6 lg:text-lg md:text-sm text-justify">
                We do not require your presence for delivery. We may leave the package at your doorstep, yard, locker, mailroom, or leasing office.
            </p>
    </details>
    <details class="bg-white rounded shadow group w-3/4 mx-auto lg:my-10 md:my-5 hover:shadow-lg transition ease-in">
        <summary class="list-none flex flex-wrap items-center">
            <h3 class="flex flex-1 lg:p-4 md:p-3 lg:text-xl md:text-base cursor-pointer text-justify font-serif">
                Can i purchase alcohol, tobacco and lottery games?
            </h3>
            <div class="flex lg:w-20 md:w-10 items-center justify-center">
                <div class="border-8 border-transparent border-l-gray-600 group-open:rotate-90 transition-transform origin-left"></div>
            </div>
        </summary>
            <p class="p-6 lg:text-lg md:text-sm text-justify">This is completely dependent of each independently owned and operated Foodie location and the laws in your delivery area. Each location does reserve the right to not offer the delivery of these items. We  believe in keeping our children safe and without addiction. Because of this, we will ask for ID. when delivering your grocery shopping order that may contain age appropriate items. The person accepting the order will be required to show proof of age with either a valid, legal, State, Government or Military issued identification card. The legal age to purchase alcohol, tobacco and lottery games is dependent upon your state. As well, depending upon local laws of your delivery area, the purchase or transportation of alcohol, may not be available. </p>
    </details>
    <details class="bg-white rounded shadow group w-3/4 mx-auto lg:my-10 md:my-5 hover:shadow-lg transition ease-in">
        <summary class="list-none flex flex-wrap items-center">
            <h3 class="flex flex-1 lg:p-4 md:p-3 lg:text-xl md:text-base cursor-pointer text-justify font-serif">
                Can i tip my personal grocery shopper?
            </h3>
            <div class="flex lg:w-20 md:w-10 items-center justify-center">
                <div class="border-8 border-transparent border-l-gray-600 group-open:rotate-90 transition-transform origin-left"></div>
            </div>
        </summary>
            <p class="p-6 lg:text-lg md:text-sm text-justify">
                Please do! If you are happy and satisfied with the service that was provided to you, a tip is always welcome and appreciated, thank you!
            </p>
    </details>
</div>

<?php include('../navbar/footer.php')?>