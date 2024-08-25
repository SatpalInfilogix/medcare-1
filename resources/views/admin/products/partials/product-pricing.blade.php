<div class="card">
    <div class="card-body">
        <div class="card-header-2">
            <h5>Product Pricing</h5>
        </div>

        <div class="row">
            <div class="mb-3 col-md-4">
                <div class="mb-3">
                    <label class="form-label-title">Price For Customer</label>
                    <div class="form-group">
                        <input type="text" name="customer_price" class="form-control">
                        @if ($errors->has('customer_price'))
                        <div class="invalid-feedback d-block">{{ $errors->first('customer_price') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mb-3 col-md-4">
                <div class="mb-2">
                    <label class="form-label-title">Price For Vendor</label>
                    <div class="form-group">
                        <input type="text" name="vendor_price" class="form-control">
                        @if ($errors->has('vendor_price'))
                        <div class="invalid-feedback d-block">{{ $errors->first('vendor_price') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mb-3 col-md-4">
                <div class="mb-2">
                    <label class="form-label-title">MRP</label>
                    <div class="form-group">
                        <input type="text" name="mrp" class="form-control">
                        @if ($errors->has('mrp'))
                        <div class="invalid-feedback d-block">{{ $errors->first('mrp') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>