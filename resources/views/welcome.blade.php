@extends('header')
<!-- Left sidebar & main wrapper -->
@section('section')
    <div class="w-full flex max-w-7xl mx-auto xl:px-0 lg:flex xl:border-l xl:border-r xl:border-gray-400 xl:border-opacity-40">
        <style>
            .horizontal-line {
                height: 200px;
                width: 2px;
                background: #e4e6ea;
                position: absolute;
                top: -100px;
                left: 50%;
                z-index: -1;
            }
            select {
                background-position: right 0.4rem center;
            }
        </style>

        <form action="{{url('post_data')}}" method="post">
            @csrf
            <div class="md:grid md:grid-cols-1 md:gap-6 w-full pt-6 pb-6">
                <div class="md:col-span-1 w-full max-w-7xl mx-auto px-6">
                    <h2 class="text-sm leading-6 font-medium mb-2 text-gray-900">Step 1: setup trigger</h2>
                    <div class="relative py-4 bg-white shadow overflow-hidden sm:rounded-md">
                        <div class="space-y-6 sm:space-y-5">
                            <div class="px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Create Alert
                                </h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                    Each time the trigger is fired within your store, the the conditions are checked, if they are met the chosen actions are preformed.
                                </p>
                            </div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start px-6 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Alert title
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input type="text" name="first_name" id="first_name" autocomplete="given-name" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start px-6 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Description (optional)
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <textarea id="about" name="about" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>
                                    </div>
                                </div>


                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start px-6 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Trigger
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <span type="button" class="inline-flex bg-white z-10 relative justify-center px-4 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                            <img class="-ml-1 mr-2 w-6 text-gray-400" src="//cdn.shopify.com/s/files/1/0523/5667/7813/t/1/assets/shopify-logo-png-transparent_200x.png?v=1327965704237961015" />
                                            <span class="leading-4 text-left pl-2">
                                                Order created <br />
                                                <small class="font-normal">When a new order is created</small>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-1 w-full mt-2 p-6 max-w-7xl mx-auto px-6 xl:border-t xl:border-gray-400 xl:border-opacity-20">
                    <h2 class="text-sm leading-6 font-medium mb-2 text-gray-900">Step 2: create conditions</h2>
                    <div class="condition-block-location">
                        <div class="condition-block-wrap">
                            <input type="text" name="condition_blks" id="condition_blks" value="1">
                            <div id="condition-block_1" class="condition-block relative pb-0 bg-white shadow overflow-hidden sm:rounded-md relative">
                                <div class="px-6 py-4 ">
                                    <div class="flex items-center">
                                        <div class="flex-1">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                <div class="text-gray-500">
                                                    <span type="button" class="align-middle inline-flex bg-white z-10 relative justify-center text-gray-700 bg-white">
                                                        <span class="inline-flex items-center text-xl px-3 py-0.5 rounded-md text-sm font-bold bg-yellow-100 text-yellow-800">
                                                             IF
                                                        </span>
                                                        <span class="pl-2 align-middle font-normal">
                                                            <span>
                                                                <select id="condition_choice_1" name="condition_choice_1" class=" inline-grid mr-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                                                                    <option value="all" title="">All</option>
                                                                    <option value="any" title="">Any</option>
                                                                </select>
                                                            </span>
                                                            of the following conditions are matched
                                                        </span>
                                                    </span>
                                                </div>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-rules border-t px-6 py-2">
                                    <div class="rule-row rule-row-additional line-row hover:bg-gray-200 bg-gray-100 w-ful rounded-md mx-0 my-2 p-1.5 relative">
                                        <select id="top_level" name="top_level_1_1" data-condition="1" class=" inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                                            <option selected="selected" disabled="disabled" value=" ">
                                                Filter type
                                            </option>
                                            <option value="order" title="" data-select="order">
                                                Order
                                            </option>
                                            <option value="customer" title="" data-select="customer">
                                                Customer
                                            </option>
                                            <option value="address" title="" data-select="address">
                                                Address
                                            </option>
                                            <option value="discounts" title="" data-select="discounts">
                                                Discounts
                                            </option>
                                            <option value="shipping" title="" data-select="shipping">
                                                Shipping
                                            </option>
                                            <option value="line items" title="" data-select="line_items">
                                                Line items
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <input type="text" name="condition_blks_filter_count_1" id="condition_blks_filter_count_1" value="1">
                                <input type="text" name="condition_action_count_1" id="condition_action_count_1" value="1">
                                <div class="py-0 px-6 pb-6">
                                    <button type="button" data-condition-block="1" class="add-filter-line inline-flex items-center px-0 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 focus:outline-none">
                                        <!-- Heroicon name: mail -->
                                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Add another filter condition
                                    </button>
                                </div>

                                <div class="border-t px-6 py-4 relative">
                                    <svg class="ml-2 mt-0 absolute" viewBox="0.6 0 24 30" width="24" height="30" style="
                                        width: 40px;
                                        height: 40px;
                                        /* color: red; */
                                        /* background: red; */
                                    "><path d="M2 2 v18 a8 8 0 0 0 8 8 h12" stroke="#DFE3E8" stroke-width="3" fill="none" fill-rule="evenodd" stroke-linecap="round" style="
                                        color: red;
                                        background: red;
                                        stroke: #ddd;
                                    "></path></svg>

                                    <div class="relative pb-0 bg-white ml-16 shadow overflow-hidden sm:rounded-md">
                                        <div class="px-6 py-4 ">
                                            <div class="flex items-center">
                                                <div class="flex-1">
                                                    <h3 class="text-base leading-6 font-medium text-gray-900">
                                                        <div class="text-gray-500">
                                                        <span type="button" class="align-middle inline-flex bg-white z-10 relative justify-center text-gray-700 bg-white">
                                                            <span class="inline-flex items-center mr-3 px-3 py-0.5 rounded-md font-bold bg-green-100 text-green-800">
                                                                YES
                                                            </span>
                                                            preform the following actions
                                                        </span>
                                                        </div>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="action-row-location border-t px-6 py-2">
                                            <div class="action-row action-row-additional line-row relative bg-gray-100 w-ful rounded-md m-1 p-1.5">
                                                <select id="action_type" name="action_type_1_1" data-condition="1" class=" action inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                                                    <option selected="selected" disabled="disabled" value=" ">
                                                        Action type
                                                    </option>
                                                    <option value="summary" title="" data-select="date_type"  data-nexttext="every" >
                                                        Send a summary of alerts
                                                    </option>
                                                    <option value="threshold" title="" data-select="customer">
                                                        At an alert threshold
                                                    </option>
                                                    <option value="normal" title="" data-select="address" data-nexttext="the conditions are met, send the following email">
                                                        Every time
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="py-0 px-6 pb-6">
                                            <button type="button" data-condition-block="1" class="add-action-line inline-flex items-center px-0 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 focus:outline-none">
                                                <!-- Heroicon name: mail -->
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Add another action
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-0 px-6 flex w-full">
                        <div class="mx-auto m-10 inline-flex relative items-center px-6 py-3 border border-gray-300  text-base font-medium rounded-full text-gray-700 bg-white">
                            <div class="horizontal-line"></div>
                            <span class="font-bold relative rounded-md px-2 bg-red-100 align-middle"> NO </span>
                        </div>
                    </div>
                    <div class="py-0 px-6 pb-6 flex w-full  mx-auto">
                        <button type="button" class="add-condition-block mx-auto inline-flex items-center px-6 py-3 border border-indigo-600 shadow-sm text-base font-medium rounded-md text-indigo-600 bg-gray-50 hover:text-indigo-800 hover:border-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-gray-300">
                            <!-- Heroicon name: mail -->
                            <svg class="-ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                            </svg>
                            Add another condition block
                        </button>
                    </div>
                </div>
            </div>

            <div style="visibility: hidden" class="selector-stash" data-selectclasses=" inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                <select  id="top_level" name="top_level" class=" inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    <option value="order" title="" data-select="order">
                        Order
                    </option>
                    <option value="customer" title="" data-select="customer">
                        Customer
                    </option>
                    <option value="address" title="" data-select="address_type">
                        Address
                    </option>
                    <option value="discounts" title="" data-select="discounts">
                        Discounts
                    </option>
                    <option value="shipping" title="" data-select="shipping">
                        Shipping
                    </option>
                    <option value="line items" title="" data-select="line_items">
                        Line items
                    </option>
                </select>
                <select id="order" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="order_id" data-select="number_logic_extended">
                        Order id
                    </option>
                    <option value="app_id" title="The ID of the app that created the order."  data-select="number_logic_extended">
                        App id
                    </option>
                    <option value="buyer_accepts_marketing" title="Whether the customer consented to receive email updates from your shop." data-select="boolean_logic">
                        buyer accepts marketing
                    </option>
                    <option value="client_details" title="Information about the browser that the customer used when they placed their order:" data-select="client_details">
                        Client details
                    </option>
                    <option value="created_at" title="The date and time when the order was created" data-select="date_logic">
                        Created at
                    </option>
                    <option value="current_total_duties_set" title="The current total duties charged on the order in shop and presentment currencies. The amount values associated with this field reflect order edits, returns, and refunds." data-select="money_set_logic">
                        Current total duties set
                    </option>
                    <option value="current_total_price" title="The current total price of the order in the shop currency. The value of this field reflects order edits, returns, and refunds." data-select="number_logic">
                        Current total price
                    </option>
                    <option value="current_total_price_set" title="The current total price of the order in shop and presentment currencies. The amount values associated with this field reflect order edits, returns, and refunds." data-select="money_set_logic">
                        Current total price set
                    </option>
                    <option value="current_total_tax" title="The current total taxes charged on the order in the shop currency. The value of this field reflects order edits, returns, or refunds." data-select="number_logic">
                        Current total tax
                    </option>
                    <option value="current_total_tax_set" title="The current total taxes charged on the order in shop and presentment currencies. The amount values associated with this field reflect order edits, returns, and refunds." data-select="money_set_logic">
                        Current total tax set
                    </option>
                    <option value="customer_locale" title="The two or three-letter language code, optionally followed by a region modifier."  data-selector="locale_logic">
                        Customer locale
                    </option>
                    <option value="discount_codes" title="A list of discounts applied to the order. Each discount object includes the following properties:" data-selector="discount_codes">
                        Discount codes
                    </option>
                    <option value="email" title="" data-select="text_logic">
                        Email
                    </option>
                    <option value="financial_status" title="" data-select="financial_status">
                        Financial status
                    </option>
                    <option value="landing_site" title="The URL for the page where the buyer landed when they entered the shop." data-select="text_logic">
                        Landing site
                    </option>
                    <option value="name" title="The order name" data-select="number_logic_extended">
                        Name
                    </option>
                    <option value="note" title="An optional note that a shop owner can attach to the order." data-select="text_logic">
                        Note
                    </option>
                    <option value="note_attributes" title="Extra information that is added to the order. Appears in the Additional details section of an order details page" data-select="text_name_text_value">
                        Note attributes
                    </option>
                    <option value="number" title="The order\'s position in the shop's count of orders. Numbers are sequential and start at 1." data-select="number_logic">
                        Number
                    </option>
                    <option value="order_number" title="The order 's position in the shop's count of orders starting at 1001. Order numbers are sequential and start at 1001" data-select="number_logic">
                        Order number
                    </option>
                    <option value="original_total_duties_set" title="The original total duties charged on the order in shop and presentment currencies." data-select="number_logic">
                        Original total duties set
                    </option>
                    <option value="payment_gateway_names" title="The list of payment gateways used for the order." data-select="text_logic">
                        Payment gateway names
                    </option>
                    <option value="phone" title="The customer's phone number for receiving SMS notifications." data-select="text_logic">
                        Phone
                    </option>
                    <option value="presentment_currency" title="The presentment currency that was used to display prices to the customer." data-select="currency_logic">
                        Presentment currency
                    </option>
                    <option value="processed_at" title="The date and time the order was processed. This value is the date that appears on your orders and that's used in the analytic reports. By default, it matches the 'created at' value." data-select="date_logic">
                        Processed at
                    </option>
                    <option value="processing_method" title="How the payment was processed" data-select="date_logic">
                        Processing method
                    </option>
                    <option value="referring_site" title="The website where the customer clicked a link to the shop." data-select="text_logic">
                        Referring site
                    </option>
                    <option value="source_name" title="Where the order originated. Can be set only during order creation, and is not writeable afterwards. Values for Shopify channels are protected and cannot be assigned by other API clients: web, pos, shopify_draft_order, iphone, and android"  data-select="source_name">
                        Source name
                    </option>
                    <option value="subtotal_price" title="The price of the order in the shop currency after discounts but before shipping, taxes, and tips." data-select="money_logic">
                        Subtotal price
                    </option>
                    <option value="subtotal_price_set" title="The subtotal of the order in shop and presentment currencies." data-select="money_set_logic">
                        Subtotal price set
                    </option>
                    <option value="tags" title="Tags attached to the order, formatted as a string of comma-separated values. Tags are additional short descriptors, commonly used for filtering and searching. Each individual tag is limited to 40 characters in length." data-select="text_logic">
                        Tags
                    </option>
                    <option value="tax_lines" title="An list of tax line objects, each of which details a tax applicable to the order" data-select="tax_lines">
                        Tax lines
                    </option>
                    <option value="taxes_included" title="Whether taxes are included in the order subtotal." data-select="boolean_logic">
                        taxes included
                    </option>
                    <option value="test" title="Whether this is a test order." data-select="boolean_logic">
                        Test
                    </option>
                    <option value="current_total_discounts" title="The current total discounts on the order in the shop currency. The value of this field reflects order edits, returns, and refunds.">
                        Current total discounts
                    </option>
                    <option value="current_total_discounts_set" title="The current total discounts on the order in shop and presentment currencies. The amount values associated with this field reflect order edits, returns, and refunds.">
                        Current total discounts set
                    </option>
                    <option value="discount_codes" title="Discounts applied to the order." data-select="discount_codes">
                        Discount codes
                    </option>
                    <option value="total_discounts" title="The total discounts applied to the price of the order in the shop currency." data-select="number_logic">
                        Total discounts
                    </option>
                    <option value="total_discounts_set" title="The total discounts applied to the price of the order in shop and presentment currencies." data-select="money_set_logic">
                        Total discounts set
                    </option>
                    <option value="total_line_items_price" title="The sum of all line item prices in the shop currency." data-select="number_logic">
                        Total line items price
                    </option>
                    <option value="total_line_items_price_set" title="The total of all line item prices in shop and presentment currencies." data-select="money_set_logic">
                        Total line items price set
                    </option>
                    <option value="total_outstanding" title="The total outstanding amount of the order in the shop currency." data-select="number_logic">
                        Total outstanding
                    </option>
                    <option value="total_price" title="The sum of all line item prices, discounts, shipping, taxes, and tips in the shop currency. Will always be positive." data-select="number_logic">
                        Total price
                    </option>
                    <option value="total_price_set" title="The total price of the order in shop and presentment currencies." data-select="money_set_logic">
                        Total price set
                    </option>
                    <option value="total_tax" title="The sum of all the taxes applied to the order in th shop currency. Will always be positive)." data-select="number_logic">
                        Total tax
                    </option>
                    <option value="total_price_set" title="The total tax applied to the order in shop and presentment currencies." data-select="money_set_logic">
                        Total tax set
                    </option>
                    <option value="total_tip_received" title="The sum of all the tips in the order in the shop currency." data-select="number_logic">
                        Total tip received
                    </option>
                    <option value="total_weight" title="The sum of all line item weights in grams." data-select="number_logic">
                        Total weight
                    </option>
                    <option value="updated_at" title="The date and time the order was last modified." data-select="date_logic">
                        Updated at
                    </option>
                    <option value="user_id" title="The ID of the user logged into Shopify POS who processed the order, if applicable." data-select="number_logic">
                        user id
                    </option>
                </select>
                <select id="customer" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="accepts_marketing" title="Whether the customer has consented to receive marketing material via email." data-select="boolean_logic">
                        Accepts marketing
                    </option>
                    <option value="accepts_marketing_updated_at" title="The date and time when the customer consented or objected to receiving marketing material by email. Set this value whenever the customer consents or objects to marketing materials."  data-select="date_logic">Accepts marketing updated at</option>
                    <option value="address" title="The customers default address" data-select="address">Address</option>
                    <option value="currency" title="The three-letter code (ISO 4217 format) for the currency that the customer used when they paid for their last order. Defaults to the shop currency." data-select="is_isnot_logic|currency_logic">
                        last used currency
                    </option>
                    <option value="created_at" title="The date and time when the customer was created." data-select="date_logic">Created at</option>
                    <option value="email" title="The unique email address of the custome" data-select="text_logic">Email</option>
                    <option value="first_name" title="The customer's first name." data-select="text_logic">First name</option>
                    <option value="last_name" title="The customer's last name." data-select="text_logic">Last name</option>
                    <option value="id" title="A unique identifier for the customer." data-select="number_logic_extended">id</option>
                    <option value="last_order_id" title="The ID of the customer's last order." data-select="number_logic_extended">Last order id</option>
                    <option value="last_order_name" title="The name of the customer's last order. This is directly related to the name field on the Order resource." data-select="text_logic">Last order name</option>
                    <option value="metafield" title="additional metadata assigned to the customer" data-select="metafield">Metafield</option>
                    <option value="marketing_opt_in_level" data-select="marketing_opt_in_level" data-select="boolean_logic">marketing opt in level</option>
                    <option value="multipass_identifier" data-select="number_logic_extended">Multipass identifier</option>
                    <option value="note" data-select="text_logic">Note</option>
                    <option value="orders_count" data-select="number_logic">Orders count</option>
                    <option value="phone" data-select="text_logic">Phone</option>
                    <option value="state" data-select="customer_state">State</option>
                    <option value="tags" data-select="text_logic">Tags</option>
                    <option value="tax_exempt" data-select="boolean_logic">Tax exempt</option>
                    <option value="tax_exemptions" data-select="boolean_logic">Tax exempt</option>
                    <option value="total_spent" data-select="number_logic">Total spent</option>
                    <option value="updated_at" data-select="date_logic">Updated at</option>
                    <option value="verified_email" data-select="number_logic_extended">Verified email</option>
                </select>
                <select id="address_type" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="billing_address" title="The billing address used for the order" data-select="address">
                        Billing address
                    </option>
                    <option value="shipping_address" title="The shipping address used for the order"  data-select="address">
                        Shipping address
                    </option>
                </select>
                <select id="discounts" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="current_total_discounts" title="The current total discounts on the order in the shop currency. The value of this field reflects order edits, returns, and refunds." data-select="number_logic">
                        Current total discounts
                    </option>
                    <option value="current_total_discounts_set" title="The current total discounts on the order in shop and presentment currencies. The amount values associated with this field reflect order edits, returns, and refunds." data-select="money_set_logic">
                        Current total discounts set
                    </option>
                    <option value="discount_applications" title="target details of the discounts applied to the order as as whole or the individual line items" data-select="discount_applications">
                        Discount applications
                    </option>
                    <option value="discount_codes" title="Discount code used in the order" data-select="text_logic">
                        Discount codes
                    </option>
                    <option value="total_discounts" title="The total discounts applied to the price of the order in the shop currency." data-select="number_logic">
                        Total discounts
                    </option>
                    <option value="total_discounts_set" title="The total discounts applied to the price of the order in shop and presentment currencies." data-select="money_set_logic">
                        Total discounts set
                    </option>
                </select>
                <select id="shipping" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="shipping_lines" title="An array of objects, each of which details a shipping method used. Each object has the following properties:" data-select="shipping_lines">
                        Shipping lines
                    </option>
                    <option value="shipping_address" title="The mailing address to where the order will be shipped. This address is optional and will not be available on orders that do not require shipping." data-select="address_select">
                        Shipping address
                    </option>
                    <option value="total_shipping_price_set" title="The total shipping price of the order, excluding discounts and returns, in shop and presentment currencies. If taxes_included is set to true, then total_shipping_price_set includes taxes." data-select="money_set_logic">
                        Total shipping price set
                    </option>
                </select>
                <select id="shipping_lines" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="code" title="A reference to the shipping method.">
                        Shipping line code
                    </option>
                    <option value="discounted_price" title="The price of the shipping method after line-level discounts have been applied. Doesn't reflect cart-level or order-level discounts." data-select="number_logic">
                        Discounted price
                    </option>
                    <option value="discounted_price_set" title="The price of the shipping method in both shop and presentment currencies after line-level discounts have been applied." data-select="money_set_logic">
                        Discounted price set
                    </option>
                    <option value="price" title="The price of this shipping method in the shop currency. Can't be negative." data-select="number_logic">
                        Price
                    </option>
                    <option value="price_set" title="The price of the shipping method in shop and presentment currencies." data-select="money_set_logic">
                        Price set
                    </option>
                    <option value="source" title="The source of the shipping method." data-select="text_logic">
                        Source
                    </option>
                    <option value="title" title="The title of the shipping method." data-select="text_logic">
                        Title
                    </option>
                    <option value="tax_lines" title="A list of tax line objects, each of which details a tax applicable to this shipping line." data-select="tax_lines">
                        Tax lines
                    </option>
                    <option value="carrier_identifier" title="A reference to the carrier service that provided the rate. Present when the rate was computed by a third-party carrier service." data-select="text_logic">
                        Carrier identifier
                    </option>
                    <option value="requested_fulfillment_service_id" title="A reference to the fulfillment service that is being requested for the shipping method. Present if the shipping method requires processing by a third party fulfillment service; null otherwise." data-select="number_logic_extended">
                        Requested fulfillment service id
                    </option>
                </select>
                <select id="line_items" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="fulfillable_quantity" title="The amount available to fulfill, calculated as follows: quantity - max(refunded_quantity, fulfilled_quantity) - pending_fulfilled_quantity - open_fulfilled_quantity" data-select="number_logic">
                        Fulfillable quantity
                    </option>
                    <option value="fulfillment_service" title="The service provider that's fulfilling the item. Valid values: manual, or the name of the provider, such as amazon or shipwire." data-select="text_logic">
                        Fulfillment service
                    </option>
                    <option value="fulfillment_status" title="fulfillment_status: How far along an order is in terms line items fulfilled. Valid values: null, fulfilled, partial, and not_eligible." data-select="fulfillment_status">>
                        Fulfillment status
                    </option>
                    <option value="grams" title="grams: The weight of the item in grams." data-select="number_logic">
                        Grams
                    </option>
                    <option value="id" title="The ID of the line item." data-select="number_logic_extended">
                        id
                    </option>
                    <option value="price" title="The price of the item before discounts have been applied in the shop currency." data-select="number_logic">
                        Price
                    </option>
                    <option value="price_set" title="The price of the line item in shop and presentment currencies." data-select="money_set_logic">
                        Price set
                    </option>
                    <option value="product_id" title="TThe ID of the product that the line item belongs to. Can be null if the original product associated with the order is deleted at a later date." data-select="number_logic_extended">
                        Product id
                    </option>
                    <option value="product_id" title="TThe ID of the product that the line item belongs to. Can be null if the original product associated with the order is deleted at a later date." data-select="text_logic">
                        Product tags
                    </option>
                    <option value="product_id" title="The ID of the product that the line item belongs to. Can be null if the original product associated with the order is deleted at a later date." data-select="text_logic">
                        Product title
                    </option>
                    <option value="product_id" title="TThe ID of the product that the line item belongs to. Can be null if the original product associated with the order is deleted at a later date." data-select="text_logic">
                        Product handle
                    </option>
                    <option value="quantity" title="he number of items that were purchased." data-select="numper_logic">
                        Quantity
                    </option>
                    <option value="requires_shipping" title="requires_shipping: Whether the item requires shipping." data-select="boolean_logic">
                        Requires shipping
                    </option>
                    <option value="sku" title="The item's SKU (stock keeping unit)." data-select="text_logic">
                        SKU
                    </option>
                    <option value="title" title="The title of the product." data-select="text_logic">
                        Title
                    </option>
                    <option value="variant_id" title="The ID of the product variant." data-select="number_logic_extended">
                        Variant id
                    </option>
                    <option value="variant_title" title="The title of the product variant." data-select="text_logic">
                        Variant title
                    </option>
                    <option value="vendor" title="The name of the item's supplier." data-select="text_logic">
                        Vendor
                    </option>
                    <option value="name" title="The name of the product variant." data-select="text_logic">
                        Name
                    </option>
                    <option value="gift_card" title="Is this a giftcard" data-select="boolean_logic">
                        Gift card?
                    </option>
                    <option value="properties" title="An array of custom information for the item that has been added to the cart. Often used to provide product customization options." data-select="text_name_text_value">
                        Properties
                    </option>
                    <option value="taxable" title="Whether the item was taxable." data-select="boolean_logic">
                        Taxable
                    </option>
                    <option value="tax_lines" title="A list of tax line objects, each of which details a tax applied to the item." data-select="tax_lines">
                        Tax lines
                    </option>
                    <option value="tip_payment_gateway" title="The payment gateway used to tender the tip, such as shopify_payments. Present only on tips." data-select="tax_lines">
                        Tip payment gateway
                    </option>
                    <option value="tip_payment_method" title="The payment method used to tender the tip, such as Visa. Present only on tips." data-select="tax_lines">
                        Tip payment method
                    </option>
                    <option value="total_discount" title="The total amount of the discount allocated to the line item in the shop currency. This field must be explictly set using draft orders, Shopify scripts, or the API. Instead of using this field, Shopify recommends using discount_allocations, which provides the same information." data-select="number_logic">
                        Total discount
                    </option>
                    <option value="total_discount_set" title="The total amount allocated to the line item in the presentment currency. Instead of using this field, Shopify recommends using discount_allocations, which provides the same information." data-select="money_set_logic">
                        Total discount set
                    </option>
                    <option value="discount_allocations" title="An ordered list of amounts allocated by discount applications. Each discount allocation is associated to a particular discount application." data-select="discount_allocations">
                        Discount allocations
                    </option>
                    <option value="origin_location" title="The location of the line item’s fulfillment origin." data-select="origin_location">
                        Origin location
                    </option>
                    <option value="duties" title="A list of duty objects, each containing information about a duty on the line item." data-select="duties">
                        Duties
                    </option>
                </select>
                <!-- general logics -->
                <select id="country_code" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="AF">Afghanistan</option>
                    <option value="AX">Åland Islands</option>
                    <option value="AL">Albania</option>
                    <option value="DZ">Algeria</option>
                    <option value="AS">American Samoa</option>
                    <option value="AD">Andorra</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AQ">Antarctica</option>
                    <option value="AG">Antigua and Barbuda</option>
                    <option value="AR">Argentina</option>
                    <option value="AM">Armenia</option>
                    <option value="AW">Aruba</option>
                    <option value="AU">Australia</option>
                    <option value="AT">Austria</option>
                    <option value="AZ">Azerbaijan</option>
                    <option value="BS">Bahamas</option>
                    <option value="BH">Bahrain</option>
                    <option value="BD">Bangladesh</option>
                    <option value="BB">Barbados</option>
                    <option value="BY">Belarus</option>
                    <option value="BE">Belgium</option>
                    <option value="BZ">Belize</option>
                    <option value="BJ">Benin</option>
                    <option value="BM">Bermuda</option>
                    <option value="BT">Bhutan</option>
                    <option value="BO">Bolivia, Plurinational State of</option>
                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                    <option value="BA">Bosnia and Herzegovina</option>
                    <option value="BW">Botswana</option>
                    <option value="BV">Bouvet Island</option>
                    <option value="BR">Brazil</option>
                    <option value="IO">British Indian Ocean Territory</option>
                    <option value="BN">Brunei Darussalam</option>
                    <option value="BG">Bulgaria</option>
                    <option value="BF">Burkina Faso</option>
                    <option value="BI">Burundi</option>
                    <option value="KH">Cambodia</option>
                    <option value="CM">Cameroon</option>
                    <option value="CA">Canada</option>
                    <option value="CV">Cape Verde</option>
                    <option value="KY">Cayman Islands</option>
                    <option value="CF">Central African Republic</option>
                    <option value="TD">Chad</option>
                    <option value="CL">Chile</option>
                    <option value="CN">China</option>
                    <option value="CX">Christmas Island</option>
                    <option value="CC">Cocos (Keeling) Islands</option>
                    <option value="CO">Colombia</option>
                    <option value="KM">Comoros</option>
                    <option value="CG">Congo</option>
                    <option value="CD">Congo, the Democratic Republic of the</option>
                    <option value="CK">Cook Islands</option>
                    <option value="CR">Costa Rica</option>
                    <option value="CI">Côte d'Ivoire</option>
                    <option value="HR">Croatia</option>
                    <option value="CU">Cuba</option>
                    <option value="CW">Curaçao</option>
                    <option value="CY">Cyprus</option>
                    <option value="CZ">Czech Republic</option>
                    <option value="DK">Denmark</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DM">Dominica</option>
                    <option value="DO">Dominican Republic</option>
                    <option value="EC">Ecuador</option>
                    <option value="EG">Egypt</option>
                    <option value="SV">El Salvador</option>
                    <option value="GQ">Equatorial Guinea</option>
                    <option value="ER">Eritrea</option>
                    <option value="EE">Estonia</option>
                    <option value="ET">Ethiopia</option>
                    <option value="FK">Falkland Islands (Malvinas)</option>
                    <option value="FO">Faroe Islands</option>
                    <option value="FJ">Fiji</option>
                    <option value="FI">Finland</option>
                    <option value="FR">France</option>
                    <option value="GF">French Guiana</option>
                    <option value="PF">French Polynesia</option>
                    <option value="TF">French Southern Territories</option>
                    <option value="GA">Gabon</option>
                    <option value="GM">Gambia</option>
                    <option value="GE">Georgia</option>
                    <option value="DE">Germany</option>
                    <option value="GH">Ghana</option>
                    <option value="GI">Gibraltar</option>
                    <option value="GR">Greece</option>
                    <option value="GL">Greenland</option>
                    <option value="GD">Grenada</option>
                    <option value="GP">Guadeloupe</option>
                    <option value="GU">Guam</option>
                    <option value="GT">Guatemala</option>
                    <option value="GG">Guernsey</option>
                    <option value="GN">Guinea</option>
                    <option value="GW">Guinea-Bissau</option>
                    <option value="GY">Guyana</option>
                    <option value="HT">Haiti</option>
                    <option value="HM">Heard Island and McDonald Islands</option>
                    <option value="VA">Holy See (Vatican City State)</option>
                    <option value="HN">Honduras</option>
                    <option value="HK">Hong Kong</option>
                    <option value="HU">Hungary</option>
                    <option value="IS">Iceland</option>
                    <option value="IN">India</option>
                    <option value="ID">Indonesia</option>
                    <option value="IR">Iran, Islamic Republic of</option>
                    <option value="IQ">Iraq</option>
                    <option value="IE">Ireland</option>
                    <option value="IM">Isle of Man</option>
                    <option value="IL">Israel</option>
                    <option value="IT">Italy</option>
                    <option value="JM">Jamaica</option>
                    <option value="JP">Japan</option>
                    <option value="JE">Jersey</option>
                    <option value="JO">Jordan</option>
                    <option value="KZ">Kazakhstan</option>
                    <option value="KE">Kenya</option>
                    <option value="KI">Kiribati</option>
                    <option value="KP">Korea, Democratic People's Republic of</option>
                    <option value="KR">Korea, Republic of</option>
                    <option value="KW">Kuwait</option>
                    <option value="KG">Kyrgyzstan</option>
                    <option value="LA">Lao People's Democratic Republic</option>
                    <option value="LV">Latvia</option>
                    <option value="LB">Lebanon</option>
                    <option value="LS">Lesotho</option>
                    <option value="LR">Liberia</option>
                    <option value="LY">Libya</option>
                    <option value="LI">Liechtenstein</option>
                    <option value="LT">Lithuania</option>
                    <option value="LU">Luxembourg</option>
                    <option value="MO">Macao</option>
                    <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                    <option value="MG">Madagascar</option>
                    <option value="MW">Malawi</option>
                    <option value="MY">Malaysia</option>
                    <option value="MV">Maldives</option>
                    <option value="ML">Mali</option>
                    <option value="MT">Malta</option>
                    <option value="MH">Marshall Islands</option>
                    <option value="MQ">Martinique</option>
                    <option value="MR">Mauritania</option>
                    <option value="MU">Mauritius</option>
                    <option value="YT">Mayotte</option>
                    <option value="MX">Mexico</option>
                    <option value="FM">Micronesia, Federated States of</option>
                    <option value="MD">Moldova, Republic of</option>
                    <option value="MC">Monaco</option>
                    <option value="MN">Mongolia</option>
                    <option value="ME">Montenegro</option>
                    <option value="MS">Montserrat</option>
                    <option value="MA">Morocco</option>
                    <option value="MZ">Mozambique</option>
                    <option value="MM">Myanmar</option>
                    <option value="NA">Namibia</option>
                    <option value="NR">Nauru</option>
                    <option value="NP">Nepal</option>
                    <option value="NL">Netherlands</option>
                    <option value="NC">New Caledonia</option>
                    <option value="NZ">New Zealand</option>
                    <option value="NI">Nicaragua</option>
                    <option value="NE">Niger</option>
                    <option value="NG">Nigeria</option>
                    <option value="NU">Niue</option>
                    <option value="NF">Norfolk Island</option>
                    <option value="MP">Northern Mariana Islands</option>
                    <option value="NO">Norway</option>
                    <option value="OM">Oman</option>
                    <option value="PK">Pakistan</option>
                    <option value="PW">Palau</option>
                    <option value="PS">Palestinian Territory, Occupied</option>
                    <option value="PA">Panama</option>
                    <option value="PG">Papua New Guinea</option>
                    <option value="PY">Paraguay</option>
                    <option value="PE">Peru</option>
                    <option value="PH">Philippines</option>
                    <option value="PN">Pitcairn</option>
                    <option value="PL">Poland</option>
                    <option value="PT">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                    <option value="RE">Réunion</option>
                    <option value="RO">Romania</option>
                    <option value="RU">Russian Federation</option>
                    <option value="RW">Rwanda</option>
                    <option value="BL">Saint Barthélemy</option>
                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                    <option value="KN">Saint Kitts and Nevis</option>
                    <option value="LC">Saint Lucia</option>
                    <option value="MF">Saint Martin (French part)</option>
                    <option value="PM">Saint Pierre and Miquelon</option>
                    <option value="VC">Saint Vincent and the Grenadines</option>
                    <option value="WS">Samoa</option>
                    <option value="SM">San Marino</option>
                    <option value="ST">Sao Tome and Principe</option>
                    <option value="SA">Saudi Arabia</option>
                    <option value="SN">Senegal</option>
                    <option value="RS">Serbia</option>
                    <option value="SC">Seychelles</option>
                    <option value="SL">Sierra Leone</option>
                    <option value="SG">Singapore</option>
                    <option value="SX">Sint Maarten (Dutch part)</option>
                    <option value="SK">Slovakia</option>
                    <option value="SI">Slovenia</option>
                    <option value="SB">Solomon Islands</option>
                    <option value="SO">Somalia</option>
                    <option value="ZA">South Africa</option>
                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                    <option value="SS">South Sudan</option>
                    <option value="ES">Spain</option>
                    <option value="LK">Sri Lanka</option>
                    <option value="SD">Sudan</option>
                    <option value="SR">Suriname</option>
                    <option value="SJ">Svalbard and Jan Mayen</option>
                    <option value="SZ">Swaziland</option>
                    <option value="SE">Sweden</option>
                    <option value="CH">Switzerland</option>
                    <option value="SY">Syrian Arab Republic</option>
                    <option value="TW">Taiwan, Province of China</option>
                    <option value="TJ">Tajikistan</option>
                    <option value="TZ">Tanzania, United Republic of</option>
                    <option value="TH">Thailand</option>
                    <option value="TL">Timor-Leste</option>
                    <option value="TG">Togo</option>
                    <option value="TK">Tokelau</option>
                    <option value="TO">Tonga</option>
                    <option value="TT">Trinidad and Tobago</option>
                    <option value="TN">Tunisia</option>
                    <option value="TR">Turkey</option>
                    <option value="TM">Turkmenistan</option>
                    <option value="TC">Turks and Caicos Islands</option>
                    <option value="TV">Tuvalu</option>
                    <option value="UG">Uganda</option>
                    <option value="UA">Ukraine</option>
                    <option value="AE">United Arab Emirates</option>
                    <option value="GB">United Kingdom</option>
                    <option value="US">United States</option>
                    <option value="UM">United States Minor Outlying Islands</option>
                    <option value="UY">Uruguay</option>
                    <option value="UZ">Uzbekistan</option>
                    <option value="VU">Vanuatu</option>
                    <option value="VE">Venezuela, Bolivarian Republic of</option>
                    <option value="VN">Viet Nam</option>
                    <option value="VG">Virgin Islands, British</option>
                    <option value="VI">Virgin Islands, U.S.</option>
                    <option value="WF">Wallis and Futuna</option>
                    <option value="EH">Western Sahara</option>
                    <option value="YE">Yemen</option>
                    <option value="ZM">Zambia</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
                <select id="currency_logic" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="USD">United States Dollars</option>
                    <option value="EUR">Euro</option>
                    <option value="GBP">United Kingdom Pounds</option>
                    <option value="DZD">Algeria Dinars</option>
                    <option value="ARP">Argentina Pesos</option>
                    <option value="AUD">Australia Dollars</option>
                    <option value="ATS">Austria Schillings</option>
                    <option value="BSD">Bahamas Dollars</option>
                    <option value="BBD">Barbados Dollars</option>
                    <option value="BEF">Belgium Francs</option>
                    <option value="BMD">Bermuda Dollars</option>
                    <option value="BRR">Brazil Real</option>
                    <option value="BGL">Bulgaria Lev</option>
                    <option value="CAD">Canada Dollars</option>
                    <option value="CLP">Chile Pesos</option>
                    <option value="CNY">China Yuan Renmimbi</option>
                    <option value="CYP">Cyprus Pounds</option>
                    <option value="CSK">Czech Republic Koruna</option>
                    <option value="DKK">Denmark Kroner</option>
                    <option value="NLG">Dutch Guilders</option>
                    <option value="XCD">Eastern Caribbean Dollars</option>
                    <option value="EGP">Egypt Pounds</option>
                    <option value="FJD">Fiji Dollars</option>
                    <option value="FIM">Finland Markka</option>
                    <option value="FRF">France Francs</option>
                    <option value="DEM">Germany Deutsche Marks</option>
                    <option value="XAU">Gold Ounces</option>
                    <option value="GRD">Greece Drachmas</option>
                    <option value="HKD">Hong Kong Dollars</option>
                    <option value="HUF">Hungary Forint</option>
                    <option value="ISK">Iceland Krona</option>
                    <option value="INR">India Rupees</option>
                    <option value="IDR">Indonesia Rupiah</option>
                    <option value="IEP">Ireland Punt</option>
                    <option value="ILS">Israel New Shekels</option>
                    <option value="ITL">Italy Lira</option>
                    <option value="JMD">Jamaica Dollars</option>
                    <option value="JPY">Japan Yen</option>
                    <option value="JOD">Jordan Dinar</option>
                    <option value="KRW">Korea (South) Won</option>
                    <option value="LBP">Lebanon Pounds</option>
                    <option value="LUF">Luxembourg Francs</option>
                    <option value="MYR">Malaysia Ringgit</option>
                    <option value="MXP">Mexico Pesos</option>
                    <option value="NLG">Netherlands Guilders</option>
                    <option value="NZD">New Zealand Dollars</option>
                    <option value="NOK">Norway Kroner</option>
                    <option value="PKR">Pakistan Rupees</option>
                    <option value="XPD">Palladium Ounces</option>
                    <option value="PHP">Philippines Pesos</option>
                    <option value="XPT">Platinum Ounces</option>
                    <option value="PLZ">Poland Zloty</option>
                    <option value="PTE">Portugal Escudo</option>
                    <option value="ROL">Romania Leu</option>
                    <option value="RUR">Russia Rubles</option>
                    <option value="SAR">Saudi Arabia Riyal</option>
                    <option value="XAG">Silver Ounces</option>
                    <option value="SGD">Singapore Dollars</option>
                    <option value="SKK">Slovakia Koruna</option>
                    <option value="ZAR">South Africa Rand</option>
                    <option value="KRW">South Korea Won</option>
                    <option value="ESP">Spain Pesetas</option>
                    <option value="XDR">Special Drawing Right (IMF)</option>
                    <option value="SDD">Sudan Dinar</option>
                    <option value="SEK">Sweden Krona</option>
                    <option value="CHF">Switzerland Francs</option>
                    <option value="TWD">Taiwan Dollars</option>
                    <option value="THB">Thailand Baht</option>
                    <option value="TTD">Trinidad and Tobago Dollars</option>
                    <option value="TRL">Turkey Lira</option>
                    <option value="VEB">Venezuela Bolivar</option>
                    <option value="ZMK">Zambia Kwacha</option>
                    <option value="EUR">Euro</option>
                    <option value="XCD">Eastern Caribbean Dollars</option>
                    <option value="XDR">Special Drawing Right (IMF)</option>
                    <option value="XAG">Silver Ounces</option>
                    <option value="XAU">Gold Ounces</option>
                    <option value="XPD">Palladium Ounces</option>
                    <option value="XPT">Platinum Ounces</option>
                </select>
                <select id="country" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option data-code="GB" value="United Kingdom">United Kingdom</option>
                    <option data-code="IE" value="Ireland">Ireland</option>
                    <option data-code="US" value="United States">United States</option>
                    <option data-code="DE" value="Germany">Germany</option>
                    <option disabled="disabled" value="---">---</option>
                    <option data-code="AF" value="Afghanistan">Afghanistan</option>
                    <option data-code="AX" value="Aland Islands">Åland Islands</option>
                    <option data-code="AL" value="Albania">Albania</option>
                    <option data-code="DZ" value="Algeria">Algeria</option>
                    <option data-code="AD" value="Andorra">Andorra</option>
                    <option data-code="AO" value="Angola">Angola</option>
                    <option data-code="AI" value="Anguilla">Anguilla</option>
                    <option data-code="AG" value="Antigua And Barbuda">Antigua &amp; Barbuda</option>
                    <option data-code="AR" value="Argentina">Argentina</option>
                    <option data-code="AM" value="Armenia">Armenia</option>
                    <option data-code="AW" value="Aruba">Aruba</option>
                    <option data-code="AU" value="Australia">Australia</option>
                    <option data-code="AT" value="Austria">Austria</option>
                    <option data-code="AZ" value="Azerbaijan">Azerbaijan</option>
                    <option data-code="BS" value="Bahamas">Bahamas</option>
                    <option data-code="BH" value="Bahrain">Bahrain</option>
                    <option data-code="BD" value="Bangladesh">Bangladesh</option>
                    <option data-code="BB" value="Barbados">Barbados</option>
                    <option data-code="BY" value="Belarus">Belarus</option>
                    <option data-code="BE" value="Belgium">Belgium</option>
                    <option data-code="BZ" value="Belize">Belize</option>
                    <option data-code="BJ" value="Benin">Benin</option>
                    <option data-code="BM" value="Bermuda">Bermuda</option>
                    <option data-code="BT" value="Bhutan">Bhutan</option>
                    <option data-code="BO" value="Bolivia">Bolivia</option>
                    <option data-code="BA" value="Bosnia And Herzegovina">Bosnia &amp; Herzegovina</option>
                    <option data-code="BW" value="Botswana">Botswana</option>
                    <option data-code="BV" value="Bouvet Island">Bouvet Island</option>
                    <option data-code="BR" value="Brazil">Brazil</option>
                    <option data-code="IO" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                    <option data-code="VG" value="Virgin Islands, British">British Virgin Islands</option>
                    <option data-code="BN" value="Brunei">Brunei</option>
                    <option data-code="BG" value="Bulgaria">Bulgaria</option>
                    <option data-code="BF" value="Burkina Faso">Burkina Faso</option>
                    <option data-code="BI" value="Burundi">Burundi</option>
                    <option data-code="KH" value="Cambodia">Cambodia</option>
                    <option data-code="CM" value="Republic of Cameroon">Cameroon</option>
                    <option data-code="CA" value="Canada">Canada</option>
                    <option data-code="CV" value="Cape Verde">Cape Verde</option>
                    <option data-code="BQ" value="Caribbean Netherlands">Caribbean Netherlands</option>
                    <option data-code="KY" value="Cayman Islands">Cayman Islands</option>
                    <option data-code="CF" value="Central African Republic">Central African Republic</option>
                    <option data-code="TD" value="Chad">Chad</option>
                    <option data-code="CL" value="Chile">Chile</option>
                    <option data-code="CN" value="China">China</option>
                    <option data-code="CX" value="Christmas Island">Christmas Island</option>
                    <option data-code="CC" value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                    <option data-code="CO" value="Colombia">Colombia</option>
                    <option data-code="KM" value="Comoros">Comoros</option>
                    <option data-code="CG" value="Congo">Congo - Brazzaville</option>
                    <option data-code="CD" value="Congo, The Democratic Republic Of The">Congo - Kinshasa</option>
                    <option data-code="CK" value="Cook Islands">Cook Islands</option>
                    <option data-code="CR" value="Costa Rica">Costa Rica</option>
                    <option data-code="HR" value="Croatia">Croatia</option>
                    <option data-code="CW" value="Curaçao">Curaçao</option>
                    <option data-code="CY" value="Cyprus">Cyprus</option>
                    <option data-code="CZ" value="Czech Republic">Czechia</option>
                    <option data-code="CI" value="Côte d'Ivoire">Côte d’Ivoire</option>
                    <option data-code="DK" value="Denmark">Denmark</option>
                    <option data-code="DJ" value="Djibouti">Djibouti</option>
                    <option data-code="DM" value="Dominica">Dominica</option>
                    <option data-code="DO" value="Dominican Republic">Dominican Republic</option>
                    <option data-code="EC" value="Ecuador">Ecuador</option>
                    <option data-code="EG" value="Egypt">Egypt</option>
                    <option data-code="SV" value="El Salvador">El Salvador</option>
                    <option data-code="GQ" value="Equatorial Guinea">Equatorial Guinea</option>
                    <option data-code="ER" value="Eritrea">Eritrea</option>
                    <option data-code="EE" value="Estonia">Estonia</option>
                    <option data-code="SZ" value="Eswatini">Eswatini</option>
                    <option data-code="ET" value="Ethiopia">Ethiopia</option>
                    <option data-code="FK" value="Falkland Islands (Malvinas)">Falkland Islands</option>
                    <option data-code="FO" value="Faroe Islands">Faroe Islands</option>
                    <option data-code="FJ" value="Fiji">Fiji</option>
                    <option data-code="FI" value="Finland">Finland</option>
                    <option data-code="FR" value="France">France</option>
                    <option data-code="GF" value="French Guiana">French Guiana</option>
                    <option data-code="PF" value="French Polynesia">French Polynesia</option>
                    <option data-code="TF" value="French Southern Territories">French Southern Territories</option>
                    <option data-code="GA" value="Gabon">Gabon</option>
                    <option data-code="GM" value="Gambia">Gambia</option>
                    <option data-code="GE" value="Georgia">Georgia</option>
                    <option data-code="DE" value="Germany">Germany</option>
                    <option data-code="GH" value="Ghana">Ghana</option>
                    <option data-code="GI" value="Gibraltar">Gibraltar</option>
                    <option data-code="GR" value="Greece">Greece</option>
                    <option data-code="GL" value="Greenland">Greenland</option>
                    <option data-code="GD" value="Grenada">Grenada</option>
                    <option data-code="GP" value="Guadeloupe">Guadeloupe</option>
                    <option data-code="GT" value="Guatemala">Guatemala</option>
                    <option data-code="GG" value="Guernsey">Guernsey</option>
                    <option data-code="GN" value="Guinea">Guinea</option>
                    <option data-code="GW" value="Guinea Bissau">Guinea-Bissau</option>
                    <option data-code="GY" value="Guyana">Guyana</option>
                    <option data-code="HT" value="Haiti">Haiti</option>
                    <option data-code="HM" value="Heard Island And Mcdonald Islands">Heard &amp; McDonald Islands</option>
                    <option data-code="HN" value="Honduras">Honduras</option>
                    <option data-code="HK" value="Hong Kong">Hong Kong SAR China</option>
                    <option data-code="HU" value="Hungary">Hungary</option>
                    <option data-code="IS" value="Iceland">Iceland</option>
                    <option data-code="IN" value="India">India</option>
                    <option data-code="ID" value="Indonesia">Indonesia</option>
                    <option data-code="IQ" value="Iraq">Iraq</option>
                    <option data-code="IE" value="Ireland">Ireland</option>
                    <option data-code="IM" value="Isle Of Man">Isle of Man</option>
                    <option data-code="IL" value="Israel">Israel</option>
                    <option data-code="IT" value="Italy">Italy</option>
                    <option data-code="JM" value="Jamaica">Jamaica</option>
                    <option data-code="JP" value="Japan">Japan</option>
                    <option data-code="JE" value="Jersey">Jersey</option>
                    <option data-code="JO" value="Jordan">Jordan</option>
                    <option data-code="KZ" value="Kazakhstan">Kazakhstan</option>
                    <option data-code="KE" value="Kenya">Kenya</option>
                    <option data-code="KI" value="Kiribati">Kiribati</option>
                    <option data-code="XK" value="Kosovo">Kosovo</option>
                    <option data-code="KW" value="Kuwait">Kuwait</option>
                    <option data-code="KG" value="Kyrgyzstan">Kyrgyzstan</option>
                    <option data-code="LA" value="Lao People's Democratic Republic">Laos</option>
                    <option data-code="LV" value="Latvia">Latvia</option>
                    <option data-code="LB" value="Lebanon">Lebanon</option>
                    <option data-code="LS" value="Lesotho">Lesotho</option>
                    <option data-code="LR" value="Liberia">Liberia</option>
                    <option data-code="LY" value="Libyan Arab Jamahiriya">Libya</option>
                    <option data-code="LI" value="Liechtenstein">Liechtenstein</option>
                    <option data-code="LT" value="Lithuania">Lithuania</option>
                    <option data-code="LU" value="Luxembourg">Luxembourg</option>
                    <option data-code="MO" value="Macao">Macao SAR China</option>
                    <option data-code="MG" value="Madagascar">Madagascar</option>
                    <option data-code="MW" value="Malawi">Malawi</option>
                    <option data-code="MY" value="Malaysia">Malaysia</option>
                    <option data-code="MV" value="Maldives">Maldives</option>
                    <option data-code="ML" value="Mali">Mali</option>
                    <option data-code="MT" value="Malta">Malta</option>
                    <option data-code="MQ" value="Martinique">Martinique</option>
                    <option data-code="MR" value="Mauritania">Mauritania</option>
                    <option data-code="MU" value="Mauritius">Mauritius</option>
                    <option data-code="YT" value="Mayotte">Mayotte</option>
                    <option data-code="MX" value="Mexico">Mexico</option>
                    <option data-code="MD" value="Moldova, Republic of">Moldova</option>
                    <option data-code="MC" value="Monaco">Monaco</option>
                    <option data-code="MN" value="Mongolia">Mongolia</option>
                    <option data-code="ME" value="Montenegro">Montenegro</option>
                    <option data-code="MS" value="Montserrat">Montserrat</option>
                    <option data-code="MA" value="Morocco">Morocco</option>
                    <option data-code="MZ" value="Mozambique">Mozambique</option>
                    <option data-code="MM" value="Myanmar">Myanmar (Burma)</option>
                    <option data-code="NA" value="Namibia">Namibia</option>
                    <option data-code="NR" value="Nauru">Nauru</option>
                    <option data-code="NP" value="Nepal">Nepal</option>
                    <option data-code="NL" value="Netherlands">Netherlands</option>
                    <option data-code="NC" value="New Caledonia">New Caledonia</option>
                    <option data-code="NZ" value="New Zealand">New Zealand</option>
                    <option data-code="NI" value="Nicaragua">Nicaragua</option>
                    <option data-code="NE" value="Niger">Niger</option>
                    <option data-code="NG" value="Nigeria">Nigeria</option>
                    <option data-code="NU" value="Niue">Niue</option>
                    <option data-code="NF" value="Norfolk Island">Norfolk Island</option>
                    <option data-code="MK" value="North Macedonia">North Macedonia</option>
                    <option data-code="NO" value="Norway">Norway</option>
                    <option data-code="OM" value="Oman">Oman</option>
                    <option data-code="PK" value="Pakistan">Pakistan</option>
                    <option data-code="PS" value="Palestinian Territory, Occupied">Palestinian Territories</option>
                    <option data-code="PA" value="Panama">Panama</option>
                    <option data-code="PG" value="Papua New Guinea">Papua New Guinea</option>
                    <option data-code="PY" value="Paraguay">Paraguay</option>
                    <option data-code="PE" value="Peru">Peru</option>
                    <option data-code="PH" value="Philippines">Philippines</option>
                    <option data-code="PN" value="Pitcairn">Pitcairn Islands</option>
                    <option data-code="PL" value="Poland">Poland</option>
                    <option data-code="PT" value="Portugal">Portugal</option>
                    <option data-code="QA" value="Qatar">Qatar</option>
                    <option data-code="RE" value="Reunion">Réunion</option>
                    <option data-code="RO" value="Romania">Romania</option>
                    <option data-code="RU" value="Russia">Russia</option>
                    <option data-code="RW" value="Rwanda">Rwanda</option>
                    <option data-code="WS" value="Samoa">Samoa</option>
                    <option data-code="SM" value="San Marino">San Marino</option>
                    <option data-code="ST" value="Sao Tome And Principe">São Tomé &amp; Príncipe</option>
                    <option data-code="SA" value="Saudi Arabia">Saudi Arabia</option>
                    <option data-code="SN" value="Senegal">Senegal</option>
                    <option data-code="RS" value="Serbia">Serbia</option>
                    <option data-code="SC" value="Seychelles">Seychelles</option>
                    <option data-code="SL" value="Sierra Leone">Sierra Leone</option>
                    <option data-code="SG" value="Singapore">Singapore</option>
                    <option data-code="SX" value="Sint Maarten">Sint Maarten</option>
                    <option data-code="SK" value="Slovakia">Slovakia</option>
                    <option data-code="SI" value="Slovenia">Slovenia</option>
                    <option data-code="SB" value="Solomon Islands">Solomon Islands</option>
                    <option data-code="SO" value="Somalia">Somalia</option>
                    <option data-code="ZA" value="South Africa">South Africa</option>
                    <option data-code="GS" value="South Georgia And The South Sandwich Islands">South Georgia &amp; South Sandwich Islands</option>
                    <option data-code="KR" value="South Korea">South Korea</option>
                    <option data-code="SS" value="South Sudan">South Sudan</option>
                    <option data-code="ES" value="Spain">Spain</option>
                    <option data-code="LK" value="Sri Lanka">Sri Lanka</option>
                    <option data-code="BL" value="Saint Barthélemy">St. Barthélemy</option>
                    <option data-code="SH" value="Saint Helena">St. Helena</option>
                    <option data-code="KN" value="Saint Kitts And Nevis">St. Kitts &amp; Nevis</option>
                    <option data-code="LC" value="Saint Lucia">St. Lucia</option>
                    <option data-code="MF" value="Saint Martin">St. Martin</option>
                    <option data-code="PM" value="Saint Pierre And Miquelon">St. Pierre &amp; Miquelon</option>
                    <option data-code="VC" value="St. Vincent">St. Vincent &amp; Grenadines</option>
                    <option data-code="SD" value="Sudan">Sudan</option>
                    <option data-code="SR" value="Suriname">Suriname</option>
                    <option data-code="SJ" value="Svalbard And Jan Mayen">Svalbard &amp; Jan Mayen</option>
                    <option data-code="SE" value="Sweden">Sweden</option>
                    <option data-code="CH" value="Switzerland">Switzerland</option>
                    <option data-code="TW" value="Taiwan">Taiwan</option>
                    <option data-code="TJ" value="Tajikistan">Tajikistan</option>
                    <option data-code="TZ" value="Tanzania, United Republic Of">Tanzania</option>
                    <option data-code="TH" value="Thailand">Thailand</option>
                    <option data-code="TL" value="Timor Leste">Timor-Leste</option>
                    <option data-code="TG" value="Togo">Togo</option>
                    <option data-code="TK" value="Tokelau">Tokelau</option>
                    <option data-code="TO" value="Tonga">Tonga</option>
                    <option data-code="TT" value="Trinidad and Tobago">Trinidad &amp; Tobago</option>
                    <option data-code="TN" value="Tunisia">Tunisia</option>
                    <option data-code="TR" value="Turkey">Turkey</option>
                    <option data-code="TM" value="Turkmenistan">Turkmenistan</option>
                    <option data-code="TC" value="Turks and Caicos Islands">Turks &amp; Caicos Islands</option>
                    <option data-code="TV" value="Tuvalu">Tuvalu</option>
                    <option data-code="UM" value="United States Minor Outlying Islands">U.S. Outlying Islands</option>
                    <option data-code="UG" value="Uganda">Uganda</option>
                    <option data-code="UA" value="Ukraine">Ukraine</option>
                    <option data-code="AE" value="United Arab Emirates">United Arab Emirates</option>
                    <option data-code="GB" value="United Kingdom">United Kingdom</option>
                    <option data-code="US" value="United States">United States</option>
                    <option data-code="UY" value="Uruguay">Uruguay</option>
                    <option data-code="UZ" value="Uzbekistan">Uzbekistan</option>
                    <option data-code="VU" value="Vanuatu">Vanuatu</option>
                    <option data-code="VA" value="Holy See (Vatican City State)">Vatican City</option>
                    <option data-code="VE" value="Venezuela">Venezuela</option>
                    <option data-code="VN" value="Vietnam">Vietnam</option>
                    <option data-code="WF" value="Wallis And Futuna">Wallis &amp; Futuna</option>
                    <option data-code="EH" value="Western Sahara">Western Sahara</option>
                    <option data-code="YE" value="Yemen">Yemen</option>
                    <option data-code="ZM" value="Zambia">Zambia</option>
                    <option data-code="ZW" value="Zimbabwe">Zimbabwe</option>
                </select>
                <input id="textbox" name="textbox" type="text" />
                <select id="money_set_logic" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="shop_money" data-select="number_logic">Shop money</option>
                    <option value="presentment_money" data-select="currency_logic" data-nexttitle="Currency used">Presentment money</option>
                </select>
                <select id="money_logic" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="amount" data-select="number_logic">Amount</option>
                    <option value="currency_code"  data-select="number_logic">Currency code</option>
                </select>
                <select id="text_logic" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="is" data-select="textbox">is</option>
                    <option value="is_not" data-select="textbox">is not</option>
                    <option value="contain" data-select="textbox">contains</option>
                    <option value="not_contain" data-select="textbox">does not contain</option>
                    <option value="is_empty" data-select="textbox">is empty</option>
                </select>
                <select id="is_isnot_logic" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="is" data-select="textbox">is</option>
                    <option value="is_not" data-select="textbox">is not</option>
                    <option value="is_empty" noswap>is not empty</option>
                    <option value="is_not_empty"noswap>is empty</option>
                </select>
                <select id="number_logic" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="more_than" data-select="textbox">more than</option>
                    <option value="less_than" data-select="textbox">less than</option>
                    <option value="equal" data-select="textbox">equals</option>
                    <option value="more_than_equal" data-select="textbox">more than or equal to</option>
                    <option value="less_than_equal" data-select="textbox">less than or equal to</option>
                </select>
                <select id="number_logic_extended" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="more_than" data-select="textbox">more than</option>
                    <option value="less_than" data-select="textbox">less than</option>
                    <option value="equal" data-select="textbox">equals</option>
                    <option value="more_than_equal" data-select="textbox">more than or equal to</option>
                    <option value="less_than_equal" data-select="textbox">less than or equal to</option>
                    <option value="contains" data-select="textbox">contains</option>
                    <option value="not_contains" data-select="textbox">does not contain</option>
                    <option value="is_empty" data-select="textbox">is empty</option>
                </select>
                <select id="date_type" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="Hour" data-select="minuate_date_picker" data-nexttext="at" data-followontext="minuates past the hour">Hour</option>
                    <option value="Day" data-select="time_picker" data-nexttext="at">Day</option>
                    <option value="Week" data-select="week_date_picker" data-nexttext="on">Week</option>
                    <option value="Month" data-select="month_date_picker" data-nexttext="on the">Month</option>
                </select>
                <select id="date_logic" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="before" data-select="date_picker">before (YYYY-MM-DD)</option>
                    <option value="after">after (YYYY-MM-DD)</option>
                    <option value="with_in">with in</option>
                    <option value="earlier_than">earlier than</option>
                </select>
                <!-- component -->
                <div id="time_picker" class="inline-grid">
                    <div class="flex">
                        <select class=" inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">10</option>
                            <option value="12">12</option>
                        </select>
                        <span class="text-xl mr-3">:</span>
                        <select class=" inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                            <option value="minuate">0</option>
                            <option value="minuate_5">5</option>
                            <option value="minuate_10">10</option>
                            <option value="minuate_15">15</option>
                            <option value="minuate_20">20</option>
                            <option value="minuate_25">25</option>
                            <option value="minuate_30">30</option>
                            <option value="minuate_35">35</option>
                            <option value="minuate_40">40</option>
                            <option value="minuate_45">45</option>
                            <option value="minuate_50">50</option>
                            <option value="minuate_55">55</option>
                        </select>
                        <select class=" inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                            <option value="am">AM</option>
                            <option value="pm">PM</option>
                        </select>
                    </div>
                </div>
                <select id="minuate_date_picker" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="minuate" data-nexttext="minuates past the hour">0</option>
                    <option value="minuate_5" data-nexttext="minuates past the hour">5</option>
                    <option value="minuate_10" data-nexttext="minuates past the hour">10</option>
                    <option value="minuate_15" data-nexttext="minuates past the hour">15</option>
                    <option value="minuate_20" data-nexttext="minuates past the hour">20</option>
                    <option value="minuate_25" data-nexttext="minuates past the hour">25</option>
                    <option value="minuate_30" data-nexttext="minuates past the hour">30</option>
                    <option value="minuate_35" data-nexttext="minuates past the hour">35</option>
                    <option value="minuate_40" data-nexttext="minuates past the hour">40</option>
                    <option value="minuate_45" data-nexttext="minuates past the hour">45</option>
                    <option value="minuate_50" data-nexttext="minuates past the hour">50</option>
                    <option value="minuate_55" data-nexttext="minuates past the hour">55</option>
                </select>
                <select id="hour_date_picker" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="hour_1" data-nexttext=":">0</option>
                    <option value="hour_2" data-nexttext="minuates past the hour">5</option>
                    <option value="hour_3" data-nexttext="minuates past the hour">10</option>
                    <option value="hour_4" data-nexttext="minuates past the hour">15</option>
                    <option value="hour_5" data-nexttext="minuates past the hour">20</option>
                    <option value="hour_6" data-nexttext="minuates past the hour">25</option>
                    <option value="hour_7" data-nexttext="minuates past the hour">30</option>
                    <option value="hour_8" data-nexttext="minuates past the hour">35</option>
                    <option value="hour_9" data-nexttext="minuates past the hour">40</option>
                    <option value="hour_10" data-nexttext="minuates past the hour">45</option>
                    <option value="hour_11" data-nexttext="minuates past the hour">50</option>
                    <option value="hour_12" data-nexttext="minuates past the hour">55</option>
                </select>
                <select id="week_date_picker" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="week_1" data-nexttext="at" data-select="time_picker">Monday</option>
                    <option value="week_2" data-nexttext="at" data-select="time_picker">Tuesday</option>
                    <option value="week_3" data-nexttext="at" data-select="time_picker">Wednesday</option>
                    <option value="week_4" data-nexttext="at" data-select="time_picker">Thursday</option>
                    <option value="week_5" data-nexttext="at" data-select="time_picker">Friday</option>
                    <option value="week_6" data-nexttext="at" data-select="time_picker">Saturday</option>
                    <option value="week_7" data-nexttext="at" data-select="time_picker">Sunday</option>
                </select>
                <select id="month_date_picker" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="month_1" data-nexttext="at" data-select="time_picker">1st</option>
                    <option value="month_2" data-nexttext="at" data-select="time_picker">2nd</option>
                    <option value="month_3" data-nexttext="at" data-select="time_picker">3rd</option>
                    <option value="month_4" data-nexttext="at" data-select="time_picker">4th</option>
                    <option value="month_5" data-nexttext="at" data-select="time_picker">5th</option>
                    <option value="month_6" data-nexttext="at" data-select="time_picker">6th</option>
                    <option value="month_7" data-nexttext="at" data-select="time_picker">7th</option>
                    <option value="month_8" data-nexttext="at" data-select="time_picker">8th</option>
                    <option value="month_9" data-nexttext="at" data-select="time_picker">9th</option>
                    <option value="month_10" data-nexttext="at" data-select="time_picker">10th</option>
                    <option value="month_11" data-nexttext="at" data-select="time_picker">11th</option>
                    <option value="month_12" data-nexttext="at" data-select="time_picker">12th</option>
                    <option value="month_13" data-nexttext="at" data-select="time_picker">13th</option>
                    <option value="month_14" data-nexttext="at" data-select="time_picker">14th</option>
                    <option value="month_15" data-nexttext="at" data-select="time_picker">15th</option>
                    <option value="month_16" data-nexttext="at" data-select="time_picker">16th</option>
                    <option value="month_17" data-nexttext="at" data-select="time_picker">17th</option>
                    <option value="month_18" data-nexttext="at" data-select="time_picker">18th</option>
                    <option value="month_19" data-nexttext="at" data-select="time_picker">19th</option>
                    <option value="month_20" data-nexttext="at" data-select="time_picker">20th</option>
                    <option value="month_21" data-nexttext="at" data-select="time_picker">21th</option>
                    <option value="month_22" data-nexttext="at" data-select="time_picker">22th</option>
                    <option value="month_23" data-nexttext="at" data-select="time_picker">23th</option>
                    <option value="month_24" data-nexttext="at" data-select="time_picker">24th</option>
                    <option value="month_25" data-nexttext="at" data-select="time_picker">25th</option>
                    <option value="month_26" data-nexttext="at" data-select="time_picker">26th</option>
                    <option value="month_27" data-nexttext="at" data-select="time_picker">27th</option>
                    <option value="month_28" data-nexttext="at" data-select="time_picker">28th</option>
                    <option value="month_29" data-nexttext="at" data-select="time_picker">29th*</option>
                    <option value="month_30" data-nexttext="at" data-select="time_picker">30th*</option>
                    <option value="month_31" data-nexttext="at" data-select="time_picker">31st*</option>
                </select>
                <select id="boolean_logic" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="true">True</option>
                    <option value="false">False</option>
                </select>
                <!-- custom logics (discoutns) -->
                <select id="discount_applications" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="allocation_method" title="The method by which the discount application value has been allocated to entitled lines. Valid values:s" data-select="allocation_method">
                        Allocation method
                    </option>
                    <option value="code" title="The discount code that was used to apply the discount. Available only for discount code applications." data-select="text_logic">
                        Code
                    </option>
                    <option value="description" title="The description of the discount application, as defined by the merchant or the Shopify Script. Available only for manual and script discount applications." data-select="text_logic">
                        Description
                    </option>
                    <option value="target_selection" title="The lines on the order, of the type defined by target_type, that the discount is allocated over" data-select="target_selection">
                        Target selection
                    </option>
                    <option value="target_type" title="The type of line on the order that the discount is applicable on. Valid values:" data-select="target_type">
                        Target type
                    </option>
                    <option value="title" title="The title of the discount application, as defined by the merchant. Available only for manual discount applications." data-select="text_logic">
                        Title
                    </option>
                    <option value="type" title="The discount application type" data-select="discount_application_type">
                        Type
                    </option>
                    <option value="value" title="The value of the discount application as a decimal. This represents the intention of the discount application. For example, if the intent was to apply a 20% discount, then the value will be 20.0. If the intent was to apply a $15 discount, then the value will be 15.0." data-select="text_logic">
                        Value
                    </option>
                    <option value="value_type" title="The type of the value" data-select="discount_applications_value_type">
                        Value type
                    </option>
                </select>
                <select id="discount_applications_value_type" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="fixed_amount" title="A fixed amount discount value in the currency of the order.">
                        Fixed_amount
                    </option>
                    <option value="percentage" title="A percentage discount value.">
                        Percentage
                    </option>
                </select>
                <select id="discount_application_type" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="automatic" title="The discount was applied automatically, such as by a Buy X Get Y automatic discount.">
                        Automatic
                    </option>
                    <option value="discount_code" title="The discount was applied by a discount code.">
                        Discount_code
                    </option>
                    <option value="manual" title="The discount was manually applied by the merchant (for example, by using an app or creating a draft order).">
                        Manual
                    </option>
                    <option value="script" title="The discount was applied by a Shopify Script.">
                        Script
                    </option>
                </select>
                <select id="target_type" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="line_item" title="The discount applies to line items.">
                        Line item
                    </option>
                    <option value="shipping_line" title="The discount applies to shipping lines.">
                        Shipping ine
                    </option>
                </select>
                <select id="target_selection" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="all" title="The discount is allocated onto all lines">
                        All
                    </option>
                    <option value="entitled" title="The discount is allocated only onto lines it is entitled for.">
                        Entitled
                    </option>
                    <option value="explicit" title="The discount is allocated onto explicitly selected lines.">
                        Explicit
                    </option>
                </select>
                <select id="allocation_method" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="across" title="The value is spread across all entitled lines.">
                        Across
                    </option>
                    <option value="each" title="The value is applied onto every entitled line.">
                        Each
                    </option>
                    <option value="one" title="The value is applied onto a single line." data-devnote="Caution: As of version 2020-07, across is returned instead of one as the meaning is the same for explicit discounts.">
                        One
                    </option>
                </select>
                <!-- custom logics (address) -->
                <select id="address" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="address1" title="The street address of the billing address" data-select="text_logic">
                        address 1
                    </option>
                    <option value="address2" title="An optional additional field for the street address of the billing address." data-select="text_logic">
                        address 2
                    </option>
                    <option value="city" title="The city, town, or village of the billing address." data-select="text_logic">
                        city
                    </option>
                    <option value="company" title="The company of the person associated with the billing address." data-select="text_logic">
                        company
                    </option>
                    <option value="country" title="The name of the country of the billing address." data-select="is_isnot_logic|country">
                        country
                    </option>
                    <option value="country_code" title="The two-letter code (ISO 3166-1 format) for the country of the billing address." data-select="is_isnot_logic|country" data-select="country_code">
                        country code
                    </option>
                    <option value="first_name" title="The first name of the person associated with the payment method." data-select="text_logic">
                        first name
                    </option>
                    <option value="last_name" title="The last name of the person associated with the payment method." data-select="text_logic">
                        last name
                    </option>
                    <option value="latitude" title="The latitude of the billing address." data-select="text_logic">
                        latitude
                    </option>
                    <option value="longitude" title="The longitude of the billing address." data-select="text_logic">
                        longitude
                    </option>
                    <option value="name" title="The full name of the person associated with the payment method." data-select="text_logic">
                        name
                    </option>
                    <option value="phone" title="The phone number at the billing address." data-select="text_logic">
                        phone
                    </option>
                    <option value="province" title="The name of the region (province, state, prefecture, …) of the billing address." data-select="text_logic">
                        province
                    </option>
                    <option value="province_code" title="The two-letter abbreviation of the region of the billing address." data-select="text_logic">
                        province code
                    </option>
                    <option value="zip" title="The postal code (zip, postcode, Eircode, …) of the billing address." data-select="text_logic">
                        zip
                    </option>
                </select>
                <!-- custom logics (line item) -->
                <select id="duties" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="id" title="Globally unique identifier." data-select="number_logic_extended">
                        ID
                    </option>
                    <option value="harmonized_system_code" title="The harmonized system code of the line item." data-select="number_logic_extended">
                        Harmonized system code
                    </option>
                    <option value="country_code_of_origin" title="The ISO code of the country of origin of the line item." data-select="is_isnot_logic|country" data-select="country_code">
                        Country code of origin
                    </option>
                    <option value="price" title="The price of the duty for the line item."  data-select="money_set_logic">
                        Price set
                    </option>
                    <option value="tax_lines" title="A list of tax line objects, each of which details a tax applied to the item." data-select="tax_lines">
                        Tax lines
                    </option>
                </select>
                <select id="discount_allocations" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="amount" title="The discount amount allocated to the line in the shop currency.">
                        Amount
                    </option>
                    <option value="discount_application_index" title="The index of the associated discount application in the order's discount_applications list." data-select="number_logic">
                        Discount application index
                    </option>
                    <option value="amount_set" title="The discount amount allocated to the line item in shop and presentment currencies." data-select="money_set_logic">
                        Amount set
                    </option>
                </select>
                <select id="origin_location" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="id" title="The location ID of the line item’s fulfillment origin. Used by Shopify to calculate applicable taxes. This is not the ID of the location where the order was placed. You can use the FulfillmentOrder resource to determine the location an item will be sourced from." data-select="tax_lines">
                        Location ID
                    </option>
                    <option value="country_code" title="The two-letter code (ISO 3166-1 format) for the country of the item's supplier." data-select="country_code">
                        Country code
                    </option>
                    <option value="province_code" title="The two-letter abbreviation for the region of the item's supplier." data-select="tax_lines">
                        Province code
                    </option>
                    <option value="name" title="The name of the item's supplier." data-select="tax_lines">
                        Name
                    </option>
                    <option value="address1" title="The street address of the item's supplier." data-select="tax_lines">
                        Address 1
                    </option>
                    <option value="address2" title="The suite number of the item's supplier." data-select="tax_lines">
                        Address 2
                    </option>
                    <option value="city" title="The city of the item's supplier." data-select="tax_lines">
                        City
                    </option>
                    <option value="zip" title="The zip of the item's supplier." data-select="tax_lines">
                        Zip
                    </option>
                </select>
                <!-- custom logics (order) -->
                <select id="metafield" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md " data-extra="addanother-minus-selected">
                    <option value="key" title="An identifier for the metafield (maximum of 30 characters)." data-select="text_logic">
                        Key
                    </option>
                    <option value="namespace" title="A container for a set of metadata (maximum of 20 characters). Namespaces help distinguish between metadata that you created and metadata created by another individual with a similar namespace." data-select="text_logic">
                        Namespace
                    </option>
                    <option value="value" title="Information to be stored as metadata." data-select="text_logic">
                        Value
                    </option>
                    <option value="value_type" title="The value type. Valid values: string and integer." data-select="text_logic">
                        Value type
                    </option>
                    <option value="description" title="Additional information about the metafield." data-select="text_logic">
                        Description
                    </option>
                </select>
                <select id="tax_lines" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="price" title="The amount of tax to be charged in the shop currency." data-select="number_logic">
                        Price
                    </option>
                    <option value="rate" title="The rate of tax to be applied." data-select="number_logic">
                        Rate
                    </option>
                    <option value="title" title="The name of the tax." data-select="text_logic">
                        Title
                    </option>
                </select>
                <select id="source_name" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="web" title="">
                        Web
                    </option>
                    <option value="pos" title="">
                        POS
                    </option>
                    <option value="shopify_draft_order" title="">
                        Shopify draft order
                    </option>
                    <option value="iphone" title="">
                        iPhone
                    <option value="android" title="">
                        Android
                    </option>
                    <option value="other" title="" data-select="text_logic">
                        custom
                    </option>
                </select>
                <select id="processing_method" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="checkout" title="The order was processed using the Shopify checkout.">
                        Checkout
                    </option>
                    <option value="direct" title="The order was processed using a direct payment provider.">
                        Direct
                    </option>
                    <option value="manual" title="The order was processed using a manual payment method.">
                        Manual
                    </option>
                    <option value="offsite" title="The order was processed by an external payment provider to the Shopify checkout.">
                        Offsite
                    </option>
                    <option value="express" title="The order was processed using PayPal Express Checkout.">
                        Express
                    </option>
                    <option value="free" title="The order was processed as a free order using a discount code.">
                        Free
                    </option>
                </select>
                <select id="discount_codes" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="code" title="When the associated discount application is of type code, this property returns the discount code that was entered at checkout. Otherwise this property returns the title of the discount that was applied." data-select="text_logic">
                        Code
                    </option>
                    <option value="amount" title="The amount that's deducted from the order total. When you create an order, this value is the percentage or monetary amount to deduct. After the order is created, this property returns the calculated amount." data-select="number_logic">
                        Amount
                    </option>
                    <option value="type" title="The type of discount" data-select="discount_code_type">
                        Discount code type
                    </option>
                </select>
                <select id="discount_code_type" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="fixed_amount" title="Applies amount as a unit of the store's currency. For example, if amount is 30 and the store's currency is USD, then 30 USD is deducted from the order total when the discount is applied." data-select="number_logic">
                        Fixed amount
                    </option>
                    <option value="percentage" title="Applies a discount of amount as a percentage of the order total." data-select="number_logic">
                        Percentage
                    </option>
                    <option value="shipping" title="Applies a free shipping discount on orders that have a shipping rate less than or equal to amount. For example, if amount is 30, then the discount will give the customer free shipping for any shipping rate that is less than or equal to $30." data-select="boolena_logic">
                        Shipping
                    </option>
                </select>
                <select id="client_details" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="accept_language" data-select="text_logic">Accept language</option>
                    <option value="browser_height" data-select="number_logic_extended">Browser height</option>
                    <option value="browser_ip" data-select="text_logic">Browser ip</option>
                    <option value="browser_width" data-select="number_logic_extended">Browser width</option>
                    <option value="user_agent" data-select="text_logic">User agent</option>
                </select>
                <select id="text_name_text_value" class="option-form">
                    <option value="name" data-select="text_logic">Name</option>
                    <option value="value" data-select="text_logic">Value</option>
                </select>
                <select id="customer_state" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="disabled" title="The customer doesn't have an active account. Customer accounts can be disabled from the Shopify admin at any time">Disabled</option>
                    <option value="invited" title="The customer has received an email invite to create an account.">invited</option>
                    <option value="enabled" title="The customer has created an account.">Enabled</option>
                    <option value="declined" title="The customer declined the email invite to create an account.">Declined</option>
                </select>
                <select id="marketing_opt_in_level" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="single_opt_in">Single opt in</option>
                    <option value="confirmed_opt_in">Confirmed opt in</option>
                    <option value="unknown">Unknown</option>
                </select>
                <select id="discount_applications_type" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="automatic">automatic</option>
                    <option value="discount_code">Discount code</option>
                    <option value="manual">Manual</option>
                    <option value="script">Script</option>
                </select>
                <select id="discount_applications_target_selection" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="all">All</option>
                    <option value="entitled">Entitled</option>
                    <option value="explicit">Explicit</option>
                </select>
                <select id="discount_applications_target_type" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="line_item">Line item</option>
                    <option value="shipping_line">Shipping line</option>
                </select>
                <select id="financial_status" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="pending" title="The payments are pending. Payment might fail in this state. Check again to confirm whether the payments have been paid successfully.">Pending</option>
                    <option value="authorized" title="The payments have been authorized.">Authorized</option>
                    <option value="paid" title="The order have been partially paid.">Paid</option>
                    <option value="partially_paid" title="The payments have been paid.">Partially paid</option>
                    <option value="refunded" title="The payments have been refunded.">Refunded</option>
                    <option value="partially_refunded" title=" The payments have been partially refunded.">Partially refunded</option>
                    <option value="voided" title="The payments have been voided.">Voided</option>
                </select>
                <select id="fulfillment_status" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="CANCELLED" title="The fulfillment was canceled.">Cancelled</option>
                    <option value="ERROR" title="There was an error with the fulfillment request.">Error</option>
                    <option value="FAILURE" title="The fulfillment request failed.">Failure</option>
                    <option value="OPEN" title="The third-party fulfillment service has acknowledged the fulfilment and is processing it..">Open</option>
                    <option value="PENDING" title="Shopify has created the fulfillment and is waiting for the third-party fulfillment service to transition it to open or success.">Pending</option>
                    <option value="SUCCESS" title="The fulfillment was completed successfully.">Success</option>
                </select>
                <select id="shipping_methods" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="handle" data-select="text_logic">Handle</option>
                    <option value="original_price" data-select="number_logic">Original price</option>
                    <option value="price" data-select="number_logic">Price</option>
                    <option value="title" data-select="text_logic">Title</option>
                </select>
                <select id="tax_exemptions" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="NOT_EXEMPT">Not exempt</option>
                    <option value="EXEMPT_ALL" title="This customer is exempt from all Canadian taxes.">is empty</option>
                    <option value="CA_STATUS_CARD_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid STATUS_CARD_EXEMPTION in Canada.">is empty</option>
                    <option value="CA_DIPLOMAT_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid DIPLOMAT_EXEMPTION in Canada.">is empty</option>
                    <option value="CA_BC_RESELLER_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid RESELLER_EXEMPTION in British Columbia.">is empty</option>
                    <option value="CA_MB_RESELLER_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid RESELLER_EXEMPTION in Manitoba.">is empty</option>
                    <option value="CA_SK_RESELLER_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid RESELLER_EXEMPTION in Saskatchewan.">is empty</option>
                    <option value="CA_BC_COMMERCIAL_FISHERY_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid COMMERCIAL_FISHERY_EXEMPTION in British Columbia.">is empty</option>
                    <option value="CA_MB_COMMERCIAL_FISHERY_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid COMMERCIAL_FISHERY_EXEMPTION in Manitoba.">is empty</option>
                    <option value="CA_NS_COMMERCIAL_FISHERY_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid COMMERCIAL_FISHERY_EXEMPTION in Nova Scotia.">is empty</option>
                    <option value="CA_PE_COMMERCIAL_FISHERY_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid COMMERCIAL_FISHERY_EXEMPTION in Prince Edward Island.">is empty</option>
                    <option value="CA_SK_COMMERCIAL_FISHERY_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid COMMERCIAL_FISHERY_EXEMPTION in Saskatchewan.">is empty</option>
                    <option value="CA_BC_PRODUCTION_AND_MACHINERY_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid PRODUCTION_AND_MACHINERY_EXEMPTION in British Columbia.">is empty</option>
                    <option value="CA_SK_PRODUCTION_AND_MACHINERY_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid PRODUCTION_AND_MACHINERY_EXEMPTION in Saskatchewan.">is empty</option>
                    <option value="CA_BC_SUB_CONTRACTOR_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid SUB_CONTRACTOR_EXEMPTION in British Columbia.">is empty</option>
                    <option value="CA_SK_SUB_CONTRACTOR_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid SUB_CONTRACTOR_EXEMPTION in Saskatchewan.">is empty</option>
                    <option value="CA_BC_CONTRACTOR_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid CONTRACTOR_EXEMPTION in British Columbia.">is empty</option>
                    <option value="CA_SK_CONTRACTOR_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid CONTRACTOR_EXEMPTION in Saskatchewan.">is empty</option>
                    <option value="CA_ON_PURCHASE_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid PURCHASE_EXEMPTION in Ontario.">is empty</option>
                    <option value="CA_MB_FARMER_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid FARMER_EXEMPTION in Manitoba.">is empty</option>
                    <option value="CA_NS_FARMER_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid FARMER_EXEMPTION in Nova Scotia.">is empty</option>
                    <option value="CA_SK_FARMER_EXEMPTION" title="This customer is exempt from specific taxes for holding a valid FARMER_EXEMPTION in Saskatchewan.">is empty</option>
                </select>
                <!---- select trigger ----->
                <select id="triggers" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="Cart" data-select="trigger_Cart">Cart</option>
                    <option value="Checkout" data-select="trigger_Checkout">Checkout</option>
                    <option value="Collection" data-select="trigger_Collection">Collection</option>
                    <option value="CollectionPublication" data-select="trigger_CollectionPublication">Collection Publication</option>
                    <option value="Customer" data-select="trigger_Customer">Customer</option>
                    <option value="CustomerSavedSearch" data-select="trigger_CustomerSavedSearch">Customer Saved Search</option>
                    <option value="Dispute" data-select="trigger_Dispute">Dispute</option>
                    <option value="Domain" data-select="trigger_Domain">Domain</option>
                    <option value="DraftOrder" data-select="trigger_DraftOrder">Draft Order</option>
                    <option value="Fulfillment" data-select="trigger_Fulfillment">Fulfillment</option>
                    <option value="FulfillmentEvent" data-select="trigger_FulfillmentEvent">Fulfillment Event</option>
                    <option value="Location" data-select="trigger_Location">Location</option>
                    <option value="Order" data-select="trigger_Order">Order</option>
                    <option value="OrderEdit" data-select="trigger_OrderEdit">Order Edit</option>
                    <option value="OrderTransaction" data-select="trigger_OrderTransaction">Order Transaction</option>
                    <option value="Product" data-select="trigger_Product">Product</option>
                    <option value="ProductListing" data-select="trigger_ProductListing">Product Listing</option>
                    <option value="Profile" data-select="trigger_Profile">Profile</option>
                    <option value="Refund" data-select="trigger_Refund">Refund</option>
                    <option value="Shop" data-select="trigger_Shop">Shop</option>
                    <option value="ShopAlternateLocale" data-select="trigger_ShopAlternateLocale">Shop Alternate Locale</option>
                    <option value="TenderTransaction" data-select="trigger_TenderTransaction">Tender Transaction</option>
                    <option value="Theme" data-select="trigger_Theme">Theme</option>
                </select>
                <select id="trigger_Cart" class="option-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="carts/create">created</option>
                    <option value="carts/update">updated</option>
                </select>
                <select id="trigger_Checkout" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="checkouts/create">created</option>
                    <option value="checkouts/update">update</option>
                    <option value="checkouts/delete">delete</option>
                </select>
                <select id="trigger_Collection" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="collections/create">create</option>
                    <option value="collections/update">update</option>
                    <option value="collections/delete">delete</option>
                </select>
                <select id="trigger_CollectionPublication" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="collection_listings/add">Add</option>
                    <option value="collection_listings/update">Update</option>
                    <option value="collection_listings/remove">Remove</option>
                </select>
                <select id="trigger_Customer" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="customers/create">create</option>
                    <option value="customers/disable">disable</option>
                    <option value="customers/enable">enable</option>
                    <option value="customers/update">update</option>
                </select>
                <select id="trigger_CustomerSavedSearch" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="customer_groups/create">create</option>
                    <option value="customer_groups/update">update</option>
                </select>
                <select id="trigger_Dispute" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="disputes/create">create</option>
                    <option value="disputes/update">update</option>
                </select>
                <select id="trigger_Domain" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="domains/create">create</option>
                    <option value="domains/destroy">destroy</option>
                    <option value="domains/update">update</option>
                </select>
                <select id="trigger_DraftOrder" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="draft_orders/create">create</option>
                    <option value="draft_orders/update">update</option>
                    <option value="draft_orders/delete">delete</option>
                </select>
                <select id="trigger_Fulfillment" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="fulfillments/create">create</option>
                    <option value="fulfillments/update">update</option>
                </select>
                <select id="trigger_FulfillmentEvent" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="fulfillment_events/create">create</option>
                    <option value="fulfillment_events/delete">delete</option>
                </select>
                <select id="trigger_Location" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="locations/create">create</option>
                    <option value="locations/update">update</option>
                </select>
                <select id="trigger_Order" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="orders/cancelled">cancelled</option>
                    <option value="orders/create">create</option>
                    <option value="orders/fulfilled">fulfilled</option>
                    <option value="orders/paid">paid</option>
                    <option value="orders/partially_fulfilled">upartially fulfilledpdate</option>
                    <option value="orders/updated">updated</option>
                    <option value="orders/delete">delete</option>
                </select>
                <select id="trigger_OrderEdit" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="orders/edited">edited</option>
                </select>
                <select id="trigger_OrderTransaction"  class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="order_transactions/create">create</option>
                </select>
                <select id="trigger_Product" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="products/create">create</option>
                    <option value="products/update">update</option>
                    <option value="products/delete">delete</option>
                </select>
                <select id="trigger_ProductListing" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="product_listings/add">add</option>
                    <option value="product_listings/update">update</option>
                    <option value="product_listings/remove">remove</option>
                </select>
                <select id="trigger_Profile" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="profiles/create">create</option>">
                    <option value="profiles/update">update</option>
                    <option value="profiles/delete">delete</option>
                </select>
                <select id="trigger_Refund" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="refunds/create">create</option>
                </select>
                <select id="trigger_Shop" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="app/uninstalled">uninstalled</option>
                    <option value="shop/update">update</option>
                </select>
                <select id="trigger_ShopAlternateLocale" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="locales/create">create</option>
                    <option value="locales/update">update</option>
                </select>
                <select id="trigger_TenderTransaction" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="tender_transactions/create">create</option>
                </select>
                <select id="trigger_Theme" class="trigger-form  inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md ">
                    <option value="themes/create">create</option>
                    <option value="themes/publish">publish</option>
                    <option value="themes/update">update</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="mx-auto inline-flex items-center px-6 py-3 border border-indigo-600 shadow-sm text-base font-medium rounded-md text-indigo-600 bg-gray-50 hover:text-indigo-800 hover:border-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-gray-300">
                    Post Data
                </button>
            </div>
            <br><br>
        </form>
    </div>
@endsection
