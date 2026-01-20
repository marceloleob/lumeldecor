import { Link } from '@inertiajs/react';

interface CategoryCardProps {
  category: {
    id: number;
    name: string;
    slug: string;
    image?: string;
  };
}

export default function CategoryCard({ category }: CategoryCardProps) {
  return (
    <Link
      href={`/categorias/${category.slug}`}
      className="group relative h-64 overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300"
    >
      {/* Imagem */}
      <div className="absolute inset-0 bg-gray-200">
        {category.image ? (
          <img
            src={category.image}
            alt={category.name}
            className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
          />
        ) : (
          <div className="w-full h-full bg-gradient-to-br from-primary-200 to-secondary-200" />
        )}
      </div>

      {/* Overlay */}
      <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent" />

      {/* Nome */}
      <div className="absolute inset-0 flex items-end p-6">
        <h3 className="text-2xl font-bold text-white group-hover:translate-y-[-4px] transition-transform">
          {category.name}
        </h3>
      </div>
    </Link>
  );
}
