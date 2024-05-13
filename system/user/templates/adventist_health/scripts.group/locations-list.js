const { createApp } = Vue;

createApp({
  data() {
    return {
      scroll_offest: 575,
      isLoading: false,
      loadmoretrack: 9,
      loadmorecnt: 9,
      headline_cat: 'all',
      headline_catname: 'all',
      headline_market: 'all',
      headline_marketname: 'all',
      headline_zip: '',
      headline_radius: '',
      new_data: [],
      new_data2: [],
      results: [],
      results2: [],
      searchQuery: '',
      options: [
        {exp:channel:categories category_group="12" style="linear"}
          { id: '{category_id}', name: '{category_name}', um:'{category_name:url_slug}', value: '{category_id}|{category_name}' },
        {/exp:channel:categories}  
      ],
      tag_options: [],
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
      if (this.isLoading) return;
      this.isLoading = true;

      const url = `/_location_json/l/${this.loadmoretrack}/${this.headline_cat}/${this.headline_market}/${this.headline_zip}/${this.headline_radius}`;
// alert(url) 
      axios.get(url)
        .then((response) => {
          if (response.data && response.data.length > 0) {
            this.processResponseData(response.data);
          } else {
            this.handleNoData();
          }
          this.isLoading = false;
        })
        .catch((error) => {
          console.error('Error fetching data:', error);
          this.handleNoData();
          this.isLoading = false;
        });
    },

    handleNoData() {
      this.new_data = [];
      this.new_data2 = [];
      this.tag_options = [];
      this.updateResultsVisibility();
    },

    processResponseData(data) {
      // Check if data is an array
      if (!Array.isArray(data)) {
        this.handleNoData();
        return;
      }
      if (!data || data.length === 0) {
        this.handleNoData();
        return;
      }
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
      // $("#category").prop('disabled', noResults);j
    },

    onChangeCat(event) {
      const [cat, catname] = event.target.value.split('|');
      if(cat && cat == 'all') { 
        this.updateCategory('all', 'all');
        this.fetchData();
      }
      else if(cat) {
        this.updateCategory(cat, catname);
        this.fetchData();
      }
    },

    submitSearch() {
      const zip = this.$refs.zip_search.value;
      const radius = this.$refs.zip_radius.value;
      if (this.validateZip(zip)) {
        this.updateSearch(zip, radius);
        this.fetchData();
      } else {
        alert('Please enter a valid 5 digit zip code.');
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

    updateSearch(zip, radius) {
      $cookies.set('elzip', zip, 0);
      $cookies.set('elradius', radius, 0);
      this.headline_zip = zip;
      this.headline_radius = radius;
    },

    validateZip(zip) {
      return zip.length === 5 && !isNaN(zip);
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
      const categorySelect = document.getElementById('category');
      categorySelect.selectedIndex = 0;
    },

    clearSearchFilter() {
      this.$refs.zip_search.value = '';
      $cookies.remove('elzip');
      $cookies.remove('elradius');
      this.headline_zip = '';
      this.headline_radius = '';
    },

    clearAll() {
      this.clearCategoryFilter();
      this.clearSearchFilter();
      this.loadmoretrack = this.loadmorecnt;
      this.fetchData();
    },

    loadMore() {
      this.loadmoretrack += this.loadmorecnt;
      $cookies.set('loadmoretrack', this.loadmoretrack, 0);
      this.fetchData();
      console.log("New loadmoretrack value:", this.loadmoretrack);
    },

    checkScroll() {
      const nearBottom = window.innerHeight + window.scrollY >= document.body.offsetHeight - this.scroll_offest;
      if (nearBottom && !this.isLoading) {
        this.loadMore();
      }
    },  
    
    async fetchAllResultsAndFilterCategory() {
      // Fetch data necessary for populating the select menu
      const url = `/_location_json/l/all/${this.headline_cat}/${this.headline_market}/${this.headline_zip}/${this.headline_radius}`;
      // alert(url)
      try {
        const response = await axios.get(url);
        const data = response.data;
        if (Array.isArray(data)) {
          this.processSelectMenuData(data);
        } else {
          console.error('Response data is not an array:', data);
          // Handle the case when data is not an array
        }
        this.fetchData();
      } catch (error) {
        console.error('Error fetching select menu data:', error);
      }
    },

    processSelectMenuData(data) {
      if (!Array.isArray(data)) {
        console.error('Provided data is not an array:', data);
        return; // Exit the function if data is not an array
      }
      // Process and filter data specifically for populating the select menu options
      const tagsCollected = new Set();
      data.forEach((item) => {
        if (item.tag && 0) {
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
      if (tagsCollected.size > 0 && !$cookies.get('evt_categories') && 0) {
        this.tag_options = Array.from(tagsCollected).map(tagValue => {
          let [id, name] = tagValue.split('|').map(part => part.trim());
          name = decodeHtmlEntities(name);
          return { id, name, value: tagValue };
        }).sort((a, b) => a.name.localeCompare(b.name));
        $cookies.set('evt_categories', JSON.stringify(this.tag_options), 0);
      }
    },
  },

  mounted() {
    const referer = document.referrer;
    if (!referer.includes("locations")) {
      ['elcat', 'elcatname', 'elzip', 'elradius', 'evt_categories'].forEach(cookie => $cookies.remove(cookie));
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
    this.headline_zip = $cookies.get('elzip') || '';
    this.headline_radius = $cookies.get('elradius') || '';
    this.fetchAllResultsAndFilterCategory();
    window.addEventListener('scroll', this.checkScroll);
        //  check for url hash
    const hash = window.location.hash;
    if (hash) {
      this.searchQuery = hash.substring(1);
      if (this.searchResults.length > 0) {
        var user_cat = this.searchResults[0]['id'];
        var user_catname = this.searchResults[0]['name'];

        // $cookies.remove('evt_categories');
        this.updateCategory(user_cat, user_catname)
      }
    }
    // alert(this.headline_market);
    // alert(this.headline_cat)
    this.thismarket = document.getElementById("market").value;
    var menu_value = this.headline_cat+'|'+this.headline_catname;
    if(this.headline_cat == 'all') menu_value = 'all';

    //  sort
    $("#category").html($("#category option").sort(function (a, b) {
        return a.text == b.text ? 0 : a.text < b.text ? -1 : 1
    }))
    document.getElementById("category").value = menu_value;
  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.checkScroll);
  },

})
  .use($cookies)
  .mount('#app');

function decodeHtmlEntities(text) {
  var textArea = document.createElement('textarea');
  textArea.innerHTML = text;
  return textArea.value;
}



