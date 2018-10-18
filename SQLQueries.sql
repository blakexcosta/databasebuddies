-- Grab some beer and it's respected information
select beer.INTBEERID as beerID,
    (select beername.VCHBEERNAME from beername where beer.INTBEERID = beername.INTBEERID) as beerName,
    (select category.VCHCATEGORY from category where beer.INTCATEGORYID = category.INTCATEGORYID) as categoryName,
    (select style.VCHSTYLE from style where beer.INTSTYLEID = style.INTSTYLEID) as styleName,
    (select brewer.VCHBREWER from brewer where beer.INTBREWERID = brewer.INTBREWERID) as brewerName,
	beer.VCHADDRESS as address, beer.VCHCITY as city, beer.VCHSTATE as state, beer.VCHCOUNTRY as country,
    beer.VCHDESCRIPTION as description, beer.VCHWEBSITE as website, beer.INTINTERNATIONALBITTERNESSUT as intBitternessUt,
    beer.INTSTANDARDREFMETH as standRefMeth, beer.INTUNVPRODCODE as uniProdCode, beer.DATELASTUPDATED as lastUpdate,
    beer.VCHCOORDINATES as coords, beer.DATEADDED as dateAdded
		from beer limit 10;