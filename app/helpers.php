<?php

use Illuminate\Support\Facades\{App, Config};
use LaravelLang\LocaleList\Locale;

// Génère une date aléatoire entre deux dates au format '2020-01-01' en entrée
if (!function_exists('generateRandomDateInRange')) {
	function generateRandomDateInRange($startDate, $endDate)
	{
		$start = Carbon\Carbon::parse($startDate);
		$end   = Carbon\Carbon::parse($endDate);

		$difference = $end->timestamp - $start->timestamp;

		$randomSeconds = rand(0, $difference);

		return $start->copy()->addSeconds($randomSeconds);
	}
}

// Méthode pour rendre les lien des images relatifs
if (!function_exists('replaceAbsoluteUrlsWithRelative')) {
	function replaceAbsoluteUrlsWithRelative(string $content)
	{
		$baseUrl = url('/');

		if ('/' !== substr($baseUrl, -1)) {
			$baseUrl .= '/';
		}

		$pattern     = '/<img\s+[^>]*src="(?:https?:\/\/)?' . preg_quote(parse_url($baseUrl, PHP_URL_HOST), '/') . '\/([^"]+)"/i';
		$replacement = '<img src="/$1"';

		return preg_replace($pattern, $replacement, $content);
	}

	// Translation Lower case first
	if (!function_exists('transL')) {
		function transL($key, $replace = [], $locale = null)
		{


			$key = trans($key, $replace, $locale);
			// return mb_strtolower($key, 'UTF-8');
			return mb_substr(mb_strtolower($key, 'UTF-8'), 0, 1) . mb_substr($key, 1);
		}
	}
	if (!function_exists('__L')) {
		function __L($key, $replace = [], $locale = null)
		{
			return transL($key, $replace, $locale);
		}
	}


	if (!function_exists('price_without_vat')) {
		function price_without_vat(float $price_with_vat, float $vat_rate = .2): float
		{
			return round($price_with_vat / (1 + (float) env('VAT_RATE', $vat_rate)), 2);
		}
	}

	if (!function_exists('transL')) {
		function transL($key, $replace = [], $locale = null)
		{
			$key = trans($key, $replace, $locale);

			return mb_substr(mb_strtolower($key, 'UTF-8'), 0, 1) . mb_substr($key, 1);
		}
	}

	if (!function_exists('__L')) {
		function __L($key, $replace = [], $locale = null)
		{
			return transL($key, $replace, $locale);
		}
	}

/* if (!function_exists(function: 'bigR')) {
		function bigR(float|int $r, $dec = 2, $locale = null): bool|string
		{
			$locale ??= substr(Config::get('app.locale'), 0, 2);
			$fmt = new NumberFormatter(locale: $locale, style: NumberFormatter::DECIMAL);

			

			return $fmt->format(num: round($r, $dec));
		}
	}
 */
if (!function_exists('bigR')) {
    function bigR(float|int $r, int $dec = 2, ?string $locale = null): string
    {
        $locale ??= substr(config('app.locale'), 0, 2);

        $thousandSeparator = ($locale === 'fr') ? ' ' : ','; // Espace pour FR, virgule pour EN
        $decimalSeparator = ($locale === 'fr') ? ',' : '.'; // Virgule pour FR, point pour EN

        return number_format($r, $dec, $decimalSeparator, $thousandSeparator);
    }
}

	/* if (!function_exists('ftA')) {
		function ftA($amount, $locale = null): bool|string
		{
			$locale ??= config('app.locale');

			$lang = substr($locale, 0, 2);
			preg_match('/_([^_]*)$/', $locale, $matches);
			$currency  = $matches[1] ?? 'DT';
			$formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
			

			$formatted = $formatter->formatCurrency($amount, $currency);
			return $formatted;
		}
	} */
	if (!function_exists('ftA')) {
		function ftA(float $amount, string $currency = 'EUR'): string
		{
			$supportedCurrencies = ['USD', 'EUR', 'DT', 'GBP', 'JPY', 'CAD']; // Liste des devises supportées
	
			$currency = strtoupper($currency);
			if (!in_array($currency, $supportedCurrencies)) {
				$currency = 'DT'; // Valeur par défaut
			}
	
			return number_format($amount, 2, '.', ',') . ' ' . $currency;
		}
	}

	if (!function_exists('getBestPrice')) {
		function getBestPrice($product)
		{
			$promoGlobal = \App\Models\Setting::where('key', 'promotion')->first();
	
			// Vérifie si la promotion globale est valide
			$globalPromoValid = $promoGlobal && $promoGlobal->value && now()->between($promoGlobal->date1, $promoGlobal->date2);
	
			// Vérifie si la promotion spécifique du produit est valide
			$productPromoValid = $product->promotion_price && now()->between($product->promotion_start_date, $product->promotion_end_date);
	
			// Initialise le meilleur prix avec le prix normal du produit
			$bestPrice = $product->price;
	
			// Si la promotion spécifique du produit est valide, utilise ce prix
			if ($productPromoValid) {
				$bestPrice = $product->promotion_price;
			}
	
			// Si la promotion globale est valide, calcule le prix avec la réduction globale
			if ($globalPromoValid) {
				$globalPromoPrice = $product->price * (1 - $promoGlobal->value / 100);
				if ($globalPromoPrice < $bestPrice) {
					$bestPrice = $globalPromoPrice;
				}
			}
	
			return $bestPrice;
		}
	}
	
	
}
