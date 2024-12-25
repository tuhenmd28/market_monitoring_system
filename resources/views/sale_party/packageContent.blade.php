@if ($content)

    @foreach ($products as $product)
        <tr>
            <td>{{ $product->product_name }} <input type="hidden" value="{{ $product->pro_id }}" name="product_id[]">
                {{-- <input name="vendor_id[]" type="hidden" value="{{ $product->min_price }}" name="vendor_id"> --}}
                <input name="min_price[]" type="hidden" value="{{ $product->min_price }}" name="min_price">
                <input name="seller_profit[]" type="hidden" value="{{ $product->seller_profit }}" name="seller_profit">
                @if ($product->login_id != null)
                    @php
                      $userName =  App\Models\Login::find($product->login_id)->username;
                    @endphp
                @else
                    @php
                        $userName =  App\Models\User::find($product->user_id)->user_name;
                    @endphp
                @endif
                     <input name="vendor[]" type="hidden" value="{{ $userName }}" name="vendor">
            </td>
            <td><img src="{{ asset('uploads/product/' . $product->product_img) }}"
                    style="width:100%;max-width:100px;margin:auto;" alt="product image"></td>
            <td><input min="1" type="number" onkeyup="changeQty(this)" class="form-control" name="product_qty[]"
                    value="1"></td>
            <td class="text-center qtyAdminProfitTd">{{ $product->admin_profit }}</td>
            <td class="text-center qtyTotalAdminProfit">{{ $product->admin_profit }}</td>
            <td class="text-center qtyPrice">{{ $product->pro_price }}</td>
            <td class="text-center productPrice">{{ $product->pro_price }}</td>
            <td>
                <h3 class="text-center m-0 text-danger cursor-pointer" onclick="removeItem(this)"><i
                        class="ion-close-round"></i></h3>
            </td>
        </tr>
    @endforeach
@else
    <table id="package">
        <table id="package">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th width="15%">Quantity</th>
                    <th>Admin Profit</th>
                    <th>Total Admin Profit</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th class="">
                        <h3 class="m-0"><i class="ion-trash-a"></i></h3>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    @php
                        $price = $product->pro_price;
                        $admin_profit = $product->admin_profit;
                        // $seller_profit = $product->seller_profit;
                    @endphp
                    <tr>
                        <td>{{ $product->product_name }} <input type="hidden" value="{{ $product->pro_id }}"
                                name="product_id[]">

                                <input name="min_price[]" type="hidden" value="{{ $product->min_price }}" name="min_price">
                                <input name="seller_profit[]" type="hidden" value="{{ $product->seller_profit }}" name="seller_profit">
                                @if ($product->login_id != null)
                                @php
                                  $userName =  App\Models\Login::find($product->login_id)->username;
                                @endphp
                            @else
                                @php
                                    $userName =  App\Models\User::find($product->user_id)->user_name;
                                @endphp
                            @endif
                                 <input name="vendor[]" type="hidden" value="{{ $userName }}" name="vendor">
                            </td>
                        <td><img src="{{ asset('uploads/product/' . $product->product_img) }}"
                                style="width:100%;max-width:100px;margin:auto;" alt="product image"></td>
                        <td><input min="1" type="number" onkeyup="changeQty(this)" name="product_qty[]"
                                class="form-control" value="1"></td>
                        <td class="text-center qtyAdminProfitTd">{{ $product->admin_profit }}</td>
                        <td class="text-center qtyTotalAdminProfit">{{ $product->admin_profit }}</td>
                        <td class="text-center qtyPrice">{{ $product->pro_price }}</td>
                        <td class="text-center productPrice">{{ $product->pro_price }}</td>
                        <td>
                            <h3 class="text-center m-0 text-danger cursor-pointer" onclick="removeItem(this)"><i
                                    class="ion-close-round"></i></h3>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">
                        <input id="total_price" type="hidden" value="{{ $price }}" name="total_price">
                        <input id="adminProfitInput" type="hidden" value="{{ $admin_profit }}" name="admin_profit">

                    Net Admin Profit: </th>
                    <th colspan="2" id="adminProfitFooter" class=" text-end">{{ $admin_profit }}</th>
                    <th colspan="1" class="text-end">Net Amount : </th>
                    <th colspan="1" id="totalPrice" class="text-end"> {{ $price }} </th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

        <div class="row justify-content-end">
            <div class="col-sm-6 py-4">
                <div class="form-group">
                    <label class="form-label fs-5">Custom Price</label>
                    <input type="number" step=any  class="form-control" id="custom_price" name="custom_price"
                        placeholder="Enter Custorm Price">
                </div>
            </div>
        </div>
@endif
