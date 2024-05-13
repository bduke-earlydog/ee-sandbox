const { createApp } = Vue;

createApp({
  data() {
    return {
      headline_cat: 'all',
      headline_catname: 'all',
      headline_market: 'all',
      headline_marketname: 'all',
      loadmoretrack: 24,
      loadmorecnt: 24,
      new_data: [],
      new_data2: [],
      results: [],
      results2: [],
      searchQuery: '',
      options: [
      {exp:channel:categories category_group="13" style="linear"}
        { id: '{category_id}', name: '{category_name}', um:'{category_name:url_slug}', value: '{category_id}|{category_name}' },
      {/exp:channel:categories}  
      ],
      tag_options: [

      ],
    };
  },
  computed: {
    searchResults() {
      return this.options.filter(option => 
        option.um.toLowerCase().includes(this.searchQuery.toLowerCase())
      );
    }
  },

  methods: {
    fetchData() {
      const url = `/_events_json/l/${this.loadmoretrack}/${this.headline_cat}/${this.headline_market}`;
      axios
        .get(url)
        .then((response) => {
          this.processResponseData(response.data);
        })
        .catch((error) => console.error('Error fetching data:', error));
    },

    processResponseData(data) {
      const market_stub = this.headline_marketname.toLowerCase().replaceAll(' ', '-');
      this.new_data = [];
      this.new_data2 = [];
      let tagsCollected = new Set();

      data.forEach((item) => {
        if (this.headline_marketname) {
          item.link = `/${market_stub}${item.link}`;
        }
        item.etype === 'ongoing' ? this.new_data2.push(item) : this.new_data.push(item);

        if (item.tag) {
          let individualTags = item.tag.includes(',') ? item.tag.split(',') : [item.tag];
          individualTags.forEach(tag => {
            tag = tag.trim();
            let matchingOption = this.options.find(option => option.name === tag);
            if (matchingOption && !tagsCollected.has(tag)) {
              tagsCollected.add(matchingOption.value);
            }
          });
        }
      });
      if ( tagsCollected.size > 0 &&  ! $cookies.get('evt_categories') ) {
        this.tag_options = Array.from(tagsCollected).map(tagValue => {
          let [id, name] = tagValue.split('|').map(part => part.trim());
          name = decodeHtmlEntities(name);
          return { id, name, value: tagValue };
        }).sort((a, b) => a.name.localeCompare(b.name));
        $cookies.set('evt_categories', JSON.stringify(this.tag_options),0);
      }
      else {
         const cookieData = $cookies.get('evt_categories');
          if (cookieData) {
            this.tag_options = cookieData;
          }
      }
      this.updateResultsVisibility();
    },

    updateResultsVisibility() {
      const noResults = this.new_data.length === 0 && this.new_data2.length === 0;
      $("#no_results").toggle(noResults);
      $(".cards__inner").toggle(!noResults);
      $("#no_results2").toggle(this.new_data2.length > 0 && !noResults);
      this.results = this.new_data;
      this.results2 = this.new_data2;

      $("#category").prop('disabled', noResults);
    },

    onChangeCat(event) {
      const [cat, catname] = event.target.value.split('|');
      if(cat && cat == 'all') { // check if has value
        this.updateCategory('all', 'all');
        this.fetchData();
      }
      else if(cat) {
        this.updateCategory(cat, catname);
        this.fetchData();
      }
    },

    updateCategory(cat, catname) {
      $cookies.set('elcat', cat, 0);
      $cookies.set('elcatname', catname, 0);
      this.headline_cat = cat;
      catname = decodeHtmlEntities(catname);
      this.headline_catname = catname;
    },

    updateMarket(mat, matname) {
      if(matname === 'system') {
        mat = 29;
      }
      $cookies.set('lmarket', mat, 0);
      $cookies.set('elmarketname', matname, 0);
      this.headline_market = mat;
      this.headline_marketname = matname;
    },

    clearFilter(filterType) {
      if (filterType === 'cat') {
        this.clearCategoryFilter();
      } else if (filterType === 'search') {
        this.clearSearchFilter();
      }
      this.fetchData();
    },

    clearCategoryFilter() {
      $cookies.remove('elcat');
      $cookies.remove('elcatname');
      this.headline_cat = 'all';
      this.headline_catname = 'all';

      // Reset the select box
      const categorySelect = document.getElementById('category');
      categorySelect.selectedIndex = 0;
    },

    clearAll() {
      this.clearCategoryFilter();
      this.loadmoretrack = this.loadmorecnt;
      this.fetchData();
    },

    loadMore() {
      this.loadmoretrack += 24;
      $cookies.set('loadmoretrack', this.loadmoretrack, 0);
      this.fetchData();
    },
  },

  mounted() {
    //  clear cookies if not from event url
    const referer = document.referrer;
    if (!referer.includes("events")) {
      ['elcat', 'elcatname', 'elzip', 'elradius', 'evt_categories'].forEach(cookie => $cookies.remove(cookie));
    }
    //  check for url hash
    const hash = window.location.hash;
    if (hash) {
      this.searchQuery = hash.substring(1);
      if (this.searchResults.length > 0) {
        var user_cat = this.searchResults[0]['id'];
        var user_catname = this.searchResults[0]['name'];
        this.updateCategory(user_cat, user_catname)
      }
    }

    //  initialize
    //    set market
    const marketSelectBox = document.getElementById('market');
    const [market, marketname] = marketSelectBox.value.split('|');
    this.updateMarket(market, marketname || 'system');
    //    populate
    this.headline_cat = $cookies.get('elcat') || 'all';
    this.headline_catname = $cookies.get('elcatname') || 'all';
    this.headline_catname = decodeHtmlEntities(this.headline_catname);
    //  get it
    this.fetchData();
  },
})
  .use($cookies)
  .mount('#app');

function decodeHtmlEntities(text) {
  var textArea = document.createElement('textarea');
  textArea.innerHTML = text;
  return textArea.value;
}
