# toy_store
api laravel

    получение списка товаров c фильтрацией и сортировкой(get):

    route api/products

    параметры(необязательные)
    - min_price - минимальная цена
    - max_price - максимальная цена
    - manufacturer - id производителя
    - order_date - сортировать по дате (передать 1)
    - order_price - сортировать по цене (передать 1)

.

    получение списка товаров с поиском (get)

    route api/products/search

    параметры
    - search - строка, по которой необходимо произвести поиск

.

    получение списка отзывов о товаре(get)
    
    route api/products/review
    
    параметры
    - product_id - id товара
    
.

    добавление товара в корзину текущего пользователя(post)
    
    route api/cart/add_product
    
    параметры
    - product_id - id товара
    
.

    удаление товара из корзины текущего пользователя(delete)
    
    route api/cart/delete_product
    
    параметры
    - product_id - id товара
    
.

    получение списка товаров в корзине текущего пользователя(get)
    
    route api/cart
        
.

    получение стоимости корзины текущего пользователя(get)
    
    route api/cart/price
    
.

    создание заказа(post)
    
    route /order/make
    
    параметры
    - name
    - phone
    - email
    - address
    
.

    получение списка товаров администратором c фильтрацией(get)
    
    route api/admin/index
    
    роль admin
    
    параметры(необязательные)
    - status - id статуса
    
.

    обновление статуса товара администратором(post)
    
    route api/admin/update
    
    роль admin
    
    параметры
    - id - id заказа
    - new_status - id нового статуса
    
.

    
