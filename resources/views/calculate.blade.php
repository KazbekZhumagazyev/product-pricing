<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рассчёт цены продукта</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Рассчёт стоимости продукта с налогом</h4>
                </div>
                <div class="card-body">
                    @if(session('result'))
                        <div class="alert alert-success">
                            <strong>{{ session('result') }}</strong>
                        </div>
                    @endif

                    <form action="{{ route('calculate.price') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="product" class="form-label">Выберите продукт:</label>
                            <select name="product_id" id="product" class="form-control" required>
                                <option value="">-- Выберите продукт --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->name }} ({{ number_format($product->price, 2) }}€)
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tax_number" class="form-label">Введите Tax номер:</label>
                            <input type="text" name="tax_number" id="tax_number" class="form-control"
                                   placeholder="Например, GR123456789" required>
                            @error('tax_number')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Рассчитать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
