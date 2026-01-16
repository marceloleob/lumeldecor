<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string|null $label
 * @property string $recipient_name
 * @property string $phone
 * @property string $zip_code
 * @property string $street
 * @property string $number
 * @property string|null $complement
 * @property string $neighborhood
 * @property string $city
 * @property string $state
 * @property bool $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $formatted_phone
 * @property-read string $formatted_zip_code
 * @property-read string $full_address
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address default()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereRecipientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereZipCode($value)
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $user_id
 * @property string|null $session_id
 * @property int|null $coupon_id
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Coupon|null $coupon
 * @property-read float $discount
 * @property-read int|null $items_count
 * @property-read float $subtotal
 * @property-read float $total
 * @property-read int $total_weight
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $items
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart expired()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUserId($value)
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $cart_id
 * @property string $cartable_type
 * @property int $cartable_id
 * @property int $quantity
 * @property numeric $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cart $cart
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $cartable
 * @property-read string|null $image
 * @property-read string $name
 * @property-read float $subtotal
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereCartableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereCartableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereUpdatedAt($value)
 */
	class CartItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $image
 * @property int $order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $children
 * @property-read int|null $children_count
 * @property-read string $full_name
 * @property-read Category|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category main()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category ordered()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category withoutTrashed()
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $cover_image
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property bool $is_active
 * @property bool $is_featured
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $highlighted_item
 * @property-read float $total_price
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CollectionImage> $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CollectionItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\CollectionImage|null $primaryImage
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductItem> $productItems
 * @property-read int|null $product_items_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection featured()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection inPeriod()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Collection withoutTrashed()
 */
	class Collection extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $collection_id
 * @property string $path
 * @property string|null $alt_text
 * @property bool $is_primary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Collection $collection
 * @property-read string $url
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionImage whereAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionImage whereCollectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionImage whereIsPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionImage wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionImage whereUpdatedAt($value)
 */
	class CollectionImage extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $collection_id
 * @property int $product_item_id
 * @property bool $is_highlighted
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Collection $collection
 * @property-read \App\Models\ProductItem $productItem
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionItem whereCollectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionItem whereIsHighlighted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionItem whereProductItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CollectionItem whereUpdatedAt($value)
 */
	class CollectionItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $code
 * @property string|null $description
 * @property string $type
 * @property numeric $value
 * @property numeric|null $minimum_purchase
 * @property int|null $usage_limit
 * @property int $usage_count
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read string $formatted_value
 * @property-read bool $is_expired
 * @property-read bool $is_limit_reached
 * @property-read bool $is_started
 * @property-read int|null $remaining_uses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon valid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereMinimumPurchase($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereUsageCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereUsageLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereValue($value)
 */
	class Coupon extends \Eloquent {}
}

namespace App\Models{
/**
 * @property-read string $formatted_type
 * @property-read bool $is_positive
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $inventoriable
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory adjustment()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory in()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory out()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory recent(int $days = 30)
 */
	class Inventory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property int $order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material ordered()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereUpdatedAt($value)
 */
	class Material extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $order_number
 * @property int $user_id
 * @property int $address_id
 * @property int|null $coupon_id
 * @property numeric $subtotal
 * @property numeric $discount
 * @property numeric $shipping_cost
 * @property numeric $total
 * @property string $status
 * @property int $shipping_method_id
 * @property string|null $tracking_code
 * @property string|null $customer_notes
 * @property string|null $admin_notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Address $address
 * @property-read \App\Models\Coupon|null $coupon
 * @property-read bool $can_be_cancelled
 * @property-read bool $can_be_refunded
 * @property-read bool $is_paid
 * @property-read bool $is_pending
 * @property-read int|null $items_count
 * @property-read string $status_color
 * @property-read string $status_label
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $items
 * @property-read \App\Models\Payment|null $payment
 * @property-read \App\Models\ShippingMethod $shippingMethod
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order cancelled()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order delivered()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order paid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order pending()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order processing()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order recent(int $days = 30)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order shipped()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereAdminNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCustomerNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippingCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippingMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order withoutTrashed()
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $order_id
 * @property string $orderable_type
 * @property int $orderable_id
 * @property string $name
 * @property string $sku
 * @property int $quantity
 * @property numeric $price
 * @property numeric $subtotal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string|null $image
 * @property-read \App\Models\Order $order
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $orderable
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereOrderableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereOrderableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereUpdatedAt($value)
 */
	class OrderItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $order_id
 * @property string $method
 * @property string $status
 * @property numeric $amount
 * @property string|null $pix_qr_code
 * @property string|null $pix_qr_code_base64
 * @property string|null $pix_key
 * @property string|null $boleto_url
 * @property string|null $boleto_barcode
 * @property \Illuminate\Support\Carbon|null $boleto_due_date
 * @property \Illuminate\Support\Carbon|null $paid_at
 * @property string|null $transaction_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read bool $is_boleto
 * @property-read bool $is_expired
 * @property-read bool $is_paid
 * @property-read bool $is_pending
 * @property-read bool $is_pix
 * @property-read string $method_label
 * @property-read string $status_color
 * @property-read string $status_label
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment boleto()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment expired()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment failed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment paid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment pending()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment pix()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereBoletoBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereBoletoDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereBoletoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePixKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePixQrCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePixQrCodeBase64($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereUpdatedAt($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $category_id
 * @property int|null $material_id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $short_description
 * @property array<array-key, mixed>|null $meta_data
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Category $category
 * @property-read int|null $discount_percentage
 * @property-read bool $has_discount
 * @property-read int $total_stock
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Material|null $material
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductSize> $sizes
 * @property-read int|null $sizes_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product featured()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product inStock()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMaterialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMetaData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product withoutTrashed()
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $sku
 * @property string|null $description
 * @property numeric $price
 * @property numeric|null $compare_price
 * @property bool $track_inventory
 * @property bool $is_active
 * @property bool $is_featured
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductBundleItem> $bundleItems
 * @property-read int|null $bundle_items_count
 * @property-read float $savings
 * @property-read int $savings_percentage
 * @property-read float $total_price
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inventory> $inventoryMovements
 * @property-read int|null $inventory_movements_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductItem> $productItems
 * @property-read int|null $product_items_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle featured()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle whereComparePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle whereTrackInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundle withoutTrashed()
 */
	class ProductBundle extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_bundle_id
 * @property int $product_item_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductBundle|null $bundle
 * @property-read int $available_stock
 * @property-read float $subtotal
 * @property-read \App\Models\ProductItem $productItem
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundleItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundleItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundleItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundleItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundleItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundleItem whereProductBundleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundleItem whereProductItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundleItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductBundleItem whereUpdatedAt($value)
 */
	class ProductBundleItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property int $product_size_id
 * @property string $sku
 * @property string $color
 * @property string|null $finish
 * @property numeric $price
 * @property numeric|null $compare_price
 * @property numeric|null $supplier_price
 * @property int $stock_quantity
 * @property int $min_stock
 * @property bool $is_active
 * @property bool $is_featured
 * @property bool $is_launch
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductBundle> $bundles
 * @property-read int|null $bundles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Collection> $collections
 * @property-read int|null $collections_count
 * @property-read int|null $discount_percentage
 * @property-read string $full_name
 * @property-read bool $has_discount
 * @property-read bool $is_low_stock
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductItemImage> $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inventory> $inventoryMovements
 * @property-read int|null $inventory_movements_count
 * @property-read \App\Models\ProductItemImage|null $primaryImage
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\ProductSize $productSize
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem featured()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem inStock()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem launch()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem lowStock()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereComparePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereFinish($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereIsLaunch($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereMinStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereProductSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereStockQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereSupplierPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItem whereUpdatedAt($value)
 */
	class ProductItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_item_id
 * @property string $path
 * @property string|null $alt_text
 * @property int $order
 * @property bool $is_primary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $url
 * @property-read \App\Models\ProductItem $productItem
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItemImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItemImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItemImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItemImage whereAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItemImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItemImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItemImage whereIsPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItemImage whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItemImage wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItemImage whereProductItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductItemImage whereUpdatedAt($value)
 */
	class ProductItemImage extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property string $size
 * @property string|null $shape
 * @property int|null $weight
 * @property int|null $width
 * @property int|null $height
 * @property int|null $length
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string|null $dimensions
 * @property-read string $full_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereShape($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSize whereWidth($value)
 */
	class ProductSize extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property string $type
 * @property numeric $base_cost
 * @property int|null $estimated_days
 * @property bool $is_active
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $estimated_delivery
 * @property-read string $formatted_cost
 * @property-read bool $is_correios
 * @property-read bool $is_custom
 * @property-read bool $is_fixed
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod ordered()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereBaseCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereEstimatedDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereUpdatedAt($value)
 */
	class ShippingMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

