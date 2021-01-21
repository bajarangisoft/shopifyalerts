$(function () {
    $("body").on('change', 'select', function () {
        var condition_block = $(this).attr('data-condition');
        // alert(condition_block);
        // return false;
        var selectClasses = $('.selector-stash').data('selectclasses');
        if($(this).hasClass("action")){
            var addon_cond_count = $('#condition-block_'+condition_block).find('.action-row-additional').length;
        }else{
            var addon_cond_count = $('#condition-block_'+condition_block).find('.rule-row-additional').length;
        }
        var $thisObj = $(this);
        var thisid = $thisObj.attr('id');
        var data_unique = condition_block+"_"+addon_cond_count;
        var $parentObj = $thisObj.parent('.line-row');
        $thisObj.addClass(selectClasses);
        // $parentObj.find('Classes.'+newaddedbyclass).remove();
        $thisObj.nextAll('.added-element').remove();
        var val = $thisObj.val();
        var next_selector = $thisObj.find('option:selected').data('select');

        var replace_selector = false;
        // if(next_selector != 'undefined' && next_selector != ''){
        //     var next_selector_arr = next_selector.split('|');
        //     if (next_selector_arr.length > 1) {
        //         next_selector = next_selector_arr[0];
        //         replace_selector = next_selector_arr[1];
        //     }
        // }
        console.log(data_unique + '<<<==========>>>>' +next_selector);
        if(next_selector == 'time_picker'){
            $('#time_picker select').each(function () {
                $(this).attr({ name: ""+this.name+"_"+data_unique+""});
                $(this).attr({ "data-condition": ""+condition_block+""});
                $(this).addClass("action");
            });
        }
        else {
            $('#'+next_selector).attr({ name: ""+next_selector+"_"+data_unique+""});
            $('#'+next_selector).attr({ "data-condition": ""+condition_block+""});
            if($(this).hasClass("action")){
                $('#'+next_selector).addClass("action");
            }
        }
        var selectorHTML = $('.selector-stash').find('#' + next_selector).clone();
        selectorHTML.find('[id]').each(function () { this.id = ''});

        // $('#'+next_selector).removeAttr("id");
        if ($(selectorHTML).is('select')) {
            $(selectorHTML).prepend('<option selected="selected" disabled="disabled" value=" ">Select value</option>');
        }
        if (replace_selector) {
            $(selectorHTML).find('option').each(function (i, val) {
                if ($(this).is("[noswap]")) {
                } else {
                    $(this).data('select', replace_selector);
                }
            });
        }
        if ($thisObj.find('option:selected').is("[data-nexttext]")) {
            var nexttext = $thisObj.find('option:selected').data('nexttext');
            $parentObj.append('<div class="added-element inline-grid text-xs py-3 px-3 text-center uppercase">' + nexttext + '</div>');
        }

        var classes = 'added-element';
        if ($(selectorHTML).is('select')) {
            $(selectorHTML).addClass(selectClasses);
        } else {
            $(selectorHTML).find('select').addClass(selectClasses);
        }
        $parentObj.append($(selectorHTML).addClass(classes));
        if ($thisObj.find('option:selected').is("[data-followontext]")) {

            var nexttext = $thisObj.find('option:selected').data('followontext');
            $parentObj.append('<div class="added-element inline-grid text-xs py-3 px-3 text-center uppercase">' + nexttext + '</div>');
        }
    });

    $('body').on('click', '.add-filter-line', function () {
        var condition_block = $(this).attr('data-condition-block');
        var filter_count = $('#condition-block_'+condition_block).find('.rule-row-additional').length;
        filter_count++;
        var selectorHtmlRow = "";
        selectorHtmlRow += "<div class=\"rule-row-additional line-row hover:bg-gray-200 bg-gray-100 w-ful rounded-md mx-0 my-2 p-1.5 relative\">\n" +
            "                            <button type=\"button\" class=\"remove-row absolute top-1 right-1 inline-flex items-center px-0 py-0 border border-transparent hover:shadow text-sm font-medium rounded-sm text-gray-400 hover:text-gray-900 bg-transparent hover:bg-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-400 focus:ring-gray-100\">\n" +
            "                                <svg class=\"w-5\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">\n" +
            "                                    <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M6 18L18 6M6 6l12 12\" />\n" +
            "                                </svg>\n" +
            "                            </button>\n" +
            "                            <select id=\"top_level\" data-condition=\""+condition_block+"\" name=\"top_level_"+condition_block+"_"+filter_count+"\" class=\" inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md \">\n" +
            "                                <option selected=\"selected\" disabled=\"disabled\" value=\" \">\n" +
            "                                    Filter type\n" +
            "                                </option>\n" +
            "                                <option value=\"order\" title=\"\" data-select=\"order\">\n" +
            "                                    Order\n" +
            "                                </option>\n" +
            "                                <option value=\"customer\" title=\"\" data-select=\"customer\">\n" +
            "                                    Customer\n" +
            "                                </option>\n" +
            "                                <option value=\"address\" title=\"\" data-select=\"address\">\n" +
            "                                    Address\n" +
            "                                </option>\n" +
            "                                <option value=\"discounts\" title=\"\" data-select=\"discounts\">\n" +
            "                                    Discounts\n" +
            "                                </option>\n" +
            "                                <option value=\"shipping\" title=\"\" data-select=\"shipping\">\n" +
            "                                    Shipping\n" +
            "                                </option>\n" +
            "                                <option value=\"line items\" title=\"\" data-select=\"line_items\">\n" +
            "                                    Line items\n" +
            "                                </option>\n" +
            "                            </select>\n" +
            "                        </div>";
        $(this).parents('.condition-block').find('.filter-rules').append(selectorHtmlRow);
    });

    $('body').on('click', '.add-condition-block', function () {
        // var conditionrRowHTML = $('.selector-stash').find('.condition-block-wrap').clone();
        // var oldval = condition_count;
        // condition_count++;
        // $('.selector-stash').find('.condition-block-wrap').find('select, input').each(function () {
        //     var name = this.name.replace(oldval, condition_count);
        //     $(this).attr('name', name);
        //     console.log(name)
        // });

        var cond_count = $('.condition-block-location').find('.condition-block-wrap').length;
        cond_count++;
        var conditionrRowHTML = "";
        conditionrRowHTML += "<div class=\"condition-block-wrap\"  data-condition-block=\""+cond_count+"\">\n" +
            "                            <div class=\"py-0 px-6 flex w-full\">\n" +
            "                                <div class=\"mx-auto m-10 inline-flex relative items-center px-6 py-3 border border-gray-300  text-base font-medium rounded-full text-gray-700 bg-white\">\n" +
            "                                    <div class=\"horizontal-line\"></div>\n" +
            "                                    <span class=\"font-bold relative rounded-md px-2 bg-red-100 align-middle\"> NO </span>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                            <div id=\"condition-block_"+cond_count+"\"  class=\"condition-block relative pb-0 bg-white shadow overflow-hidden sm:rounded-md relative\">\n" +
            "                                <div class=\"px-6 py-4 \">\n" +
            "                                    <div class=\"flex items-center\">\n" +
            "                                        <div class=\"flex-1\">\n" +
            "                                            <h3 class=\"text-lg leading-6 font-medium text-gray-900\">\n" +
            "                                                <div class=\"text-gray-500\">\n" +
            "                                                    <span type=\"button\" class=\"align-middle inline-flex bg-white z-10 relative justify-center text-gray-700 bg-white\">\n" +
            "                                                        <span class=\"inline-flex items-center text-xl px-3 py-0.5 rounded-md text-sm font-bold bg-yellow-100 text-yellow-800\">\n" +
            "                                                            ELSE IF\n" +
            "                                                        </span>\n" +
            "                                                        <span class=\"pl-2 align-middle font-normal\">\n" +
            "                                                        <span>\n" +
            "                                                        <select id=\"condition_choice\" name=\"condition_choice\" class=\" inline-grid mr-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md \">\n" +
            "                                                            <option value=\"all\" title=\"\">All</option>\n" +
            "                                                            <option value=\"any\" title=\"\">Any</option>\n" +
            "                                                        </select>\n" +
            "                                                        </span> of the following conditions are matched</span>\n" +
            "                                                    </span>\n" +
            "                                                </div>\n" +
            "                                            </h3>\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                                <div class=\"filter-rules border-t px-6 py-2\">\n" +
            "                                    <div class=\"rule-row-additional  rule-row  line-row hover:bg-gray-200 bg-gray-100 w-ful rounded-md mx-0 my-2 p-1.5 relative\">\n" +
            "                                        <select id=\"top_level\" name=\"top_level_"+cond_count+"_1\" data-condition=\""+cond_count+"\" class=\" inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md \">\n" +
            "                                            <option selected=\"selected\" disabled=\"disabled\" value=\" \">\n" +
            "                                                Filter type\n" +
            "                                            </option>\n" +
            "                                            <option value=\"order\" title=\"\" data-select=\"order\">\n" +
            "                                                Order\n" +
            "                                            </option>\n" +
            "                                            <option value=\"customer\" title=\"\" data-select=\"customer\">\n" +
            "                                                Customer\n" +
            "                                            </option>\n" +
            "                                            <option value=\"address\" title=\"\" data-select=\"address\">\n" +
            "                                                Address\n" +
            "                                            </option>\n" +
            "                                            <option value=\"discounts\" title=\"\" data-select=\"discounts\">\n" +
            "                                                Discounts\n" +
            "                                            </option>\n" +
            "                                            <option value=\"shipping\" title=\"\" data-select=\"shipping\">\n" +
            "                                                Shipping\n" +
            "                                            </option>\n" +
            "                                            <option value=\"line items\" title=\"\" data-select=\"line_items\">\n" +
            "                                                Line items\n" +
            "                                            </option>\n" +
            "                                        </select>\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                                <div class=\"py-0 px-6 pb-6\">\n" +
            "                                    <button type=\"button\" data-condition-block=\""+cond_count+"\" class=\"add-filter-line inline-flex items-center px-0 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 focus:outline-none\">\n" +
            "                                        <!-- Heroicon name: mail -->\n" +
            "                                        <svg class=\"-ml-1 mr-2 h-5 w-5\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">\n" +
            "                                            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z\" />\n" +
            "                                        </svg>\n" +
            "                                        Add another filter condition\n" +
            "                                    </button>\n" +
            "                                </div>\n" +
            "                                <div class=\"border-t px-6 py-4 relative\">\n" +
            "                                    <svg class=\"ml-2 mt-0 absolute\" viewBox=\"0.6 0 24 30\" width=\"24\" height=\"30\" style=\"\n" +
            "                                        width: 40px;height: 40px;\">\n" +
            "                                        <path d=\"M2 2 v18 a8 8 0 0 0 8 8 h12\" stroke=\"#DFE3E8\" stroke-width=\"3\" fill=\"none\" fill-rule=\"evenodd\" stroke-linecap=\"round\" style=\"\n" +
            "                                            color: red;\n" +
            "                                            background: red;\n" +
            "                                            stroke: #ddd;\">\n" +
            "                                        </path>\n" +
            "                                    </svg>\n" +
            "                                    <div class=\"relative pb-0 bg-white ml-16 shadow overflow-hidden sm:rounded-md\">\n" +
            "                                        <div class=\"px-6 py-4 \">\n" +
            "                                            <div class=\"flex items-center\">\n" +
            "                                                <div class=\"flex-1\">\n" +
            "                                                    <h3 class=\"text-base leading-6 font-medium text-gray-900\">\n" +
            "                                                        <div class=\"text-gray-500\">\n" +
            "                                                            <span type=\"button\" class=\"align-middle inline-flex bg-white z-10 relative justify-center text-gray-700 bg-white\">\n" +
            "                                                                <span class=\"inline-flex items-center mr-3 px-3 py-0.5 rounded-md font-bold bg-green-100 text-green-800\">\n" +
            "                                                                    YES\n" +
            "                                                                </span>\n" +
            "                                                                preform the following actions\n" +
            "                                                            </span>\n" +
            "                                                        </div>\n" +
            "                                                    </h3>\n" +
            "                                                </div>\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "                                        <div class=\"action-row-location border-t px-6 py-2\">\n" +
            "                                            <div class=\" action-row  line-row relative bg-gray-100 w-ful rounded-md m-1 p-1.5\">\n" +
            "                                                <select id=\"action_type\" data-condition=\""+cond_count+"\" name=\"action_type\" class=\"action inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md \">\n" +
            "                                                    <option selected=\"selected\" disabled=\"disabled\" value=\" \">\n" +
            "                                                        Action type\n" +
            "                                                    </option>\n" +
            "                                                    <option value=\"summary\" title=\"\" data-select=\"date_type\"  data-nexttext=\"every\" >\n" +
            "                                                        Send a summary of alerts\n" +
            "                                                    </option>\n" +
            "                                                    <option value=\"threshold\" title=\"\" data-select=\"customer\">\n" +
            "                                                        At an alert threshold\n" +
            "                                                    </option>\n" +
            "                                                    <option value=\"normal\" title=\"\" data-select=\"address\" data-nexttext=\"the conditions are met, send the following email\">\n" +
            "                                                        Every time\n" +
            "                                                    </option>\n" +
            "                                                </select>\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "                                        <div class=\"py-0 px-6 pb-6\">\n" +
            "                                            <button type=\"button\" data-condition-block=\""+cond_count+"\" class=\"add-action-line inline-flex items-center px-0 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 focus:outline-none\">\n" +
            "                                                <!-- Heroicon name: mail -->\n" +
            "                                                <svg class=\"-ml-1 mr-2 h-5 w-5\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">\n" +
            "                                                    <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z\" />\n" +
            "                                                </svg>\n" +
            "                                                Add another action\n" +
            "                                            </button>\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                        </div>";
        $('.condition-block-location').append(conditionrRowHTML);
    });

    $('body').on('click', '.add-action-line', function () {
        var condition_block = $(this).attr('data-condition-block');
        var action_count = $('#condition-block_'+condition_block).find('.action-row-additional').length;
        action_count++;
        var actionRowHtml = "";
        actionRowHtml = "<div class=\"action-row-additional line-row relative bg-gray-100 w-ful rounded-md m-1 p-1.5\">\n" +
            "                            <button type=\"button\" class=\"remove-row absolute top-1 right-1 inline-flex items-center px-0 py-0 border border-transparent hover:shadow text-sm font-medium rounded-sm text-gray-400 hover:text-gray-900 bg-transparent hover:bg-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-400 focus:ring-gray-100\">\n" +
            "                                <svg class=\"w-5\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">\n" +
            "                                    <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M6 18L18 6M6 6l12 12\" />\n" +
            "                                </svg>\n" +
            "                            </button>\n" +
            "                            <select id=\"action_type\" data-condition=\""+condition_block+"\" name=\"action_type_"+condition_block+"_"+action_count+"\" class=\"action inline-grid m-1.5 py-1.5 pr-8 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md \">\n" +
            "                                <option selected=\"selected\" disabled=\"disabled\" value=\" \">\n" +
            "                                    Action type\n" +
            "                                </option>\n" +
            "                                <option value=\"summary\" title=\"\" data-select=\"date_type\"  data-nexttext=\"every\" >\n" +
            "                                    Send a summary of alerts\n" +
            "                                </option>\n" +
            "                                <option value=\"threshold\" title=\"\" data-select=\"customer\">\n" +
            "                                    At an alert threshold\n" +
            "                                </option>\n" +
            "                                <option value=\"normal\" title=\"\" data-select=\"address\" data-nexttext=\"the conditions are met, send the following email\">\n" +
            "                                    Every time\n" +
            "                                </option>\n" +
            "                            </select>\n" +
            "                        </div>";
        // var actionRowHTML = $('.selector-stash').find('.action-row-additional').clone();
        // var oldval = condition_count+'_'+action_count;
        // action_count++;
        // $('.selector-stash').find('.action-row-additional').find('select, input').each(function () {
        //     var name = this.name.replace(oldval, condition_count+'_'+action_count);
        //     $(this).attr('name', name);
        //     console.log(name)
        // });
        $(this).parents('.condition-block').find('.action-row-location').append(actionRowHtml);
    });
});
