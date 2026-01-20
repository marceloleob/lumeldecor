import { Link } from '@inertiajs/react';

interface ProductCardProps {
  product: {
    id: number;
    name: string;
    slug: string;
    short_description?: string;
    price_range?: string;
    lowest_price?: number;
    image?: string;
  };
}

export default function ProductCard({ product }: ProductCardProps) {
  return (
    <Link
      href={`/produtos/${product.slug}`}
      className="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300"
    >
      {/* Imagem */}
      <div className="aspect-square overflow-hidden bg-gray-100">
        {product.image ? (
          <img
            src={product.image}
            alt={product.name}
            className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
          />
        ) : (
          <div className="w-full h-full flex items-center justify-center text-gray-400">
            <svg className="w-20 h-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth={1}
                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
              />
            </svg>
          </div>
        )}
      </div>

      {/* Conteúdo */}
      <div className="p-4">
        <h3 className="font-semibold text-gray-800 group-hover:text-primary-600 transition-colors line-clamp-2 mb-2">
          {product.name}
        </h3>

        {product.short_description && (
          <p className="text-sm text-gray-500 line-clamp-2 mb-3">{product.short_description}</p>
        )}

        <div className="flex items-center justify-between">
          <div>
            {product.price_range ? (
              <p className="text-lg font-bold text-gray-900">{product.price_range}</p>
            ) : product.lowest_price ? (
              <p className="text-lg font-bold text-gray-900">R$ {product.lowest_price.toFixed(2).replace('.', ',')}</p>
            ) : null}
          </div>

          <span className="text-primary-600 group-hover:translate-x-1 transition-transform">→</span>
        </div>
      </div>
    </Link>
  );
}
