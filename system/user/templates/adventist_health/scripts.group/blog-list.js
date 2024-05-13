// Vue application setup
const { createApp } = Vue;
createApp({
  data() {
    return {
      scroll_offest: 575,
      isLoading: false,
      loadmoretrack: 9,
      loadmorecnt: 9,
      headline_year: "",
      headline_cat: "",
      headline_catname: "",
      headline_search: "",
      search_display: "",
      thismarket: "",
      results: [],
      searchQuery: '',
      options: [
        {exp:channel:categories category_group="3" style="linear"}
          { id: '{category_id}', name: '{category_name}', um:'{category_name:url_slug}', value: '{category_id}|{category_name}' },
        {/exp:channel:categories}  
      ],
      tag_options: [],
      showNoResults: false,
      cache: {},
    };
  },

  computed: {
    sortedOptions() {
      return this.options.sort((a, b) => a.name.localeCompare(b.name));
    },

    searchResults() { 
      return this.sortedOptions.filter(option => 
        option.um.toLowerCase().includes(this.searchQuery.toLowerCase())
      );
    },

    sortedTagOptions() {
      return this.tag_options.sort((a, b) => a.name.localeCompare(b.name));
    }
  },

  methods: {
    initializeDataFromCookies() {
      this.headline_year = $cookies.get('byear') || 'all';
      this.headline_cat = $cookies.get('bcat') || 'all';
      this.headline_catname = decodeHtmlEntities($cookies.get('bcatname')) || 'all';
      this.headline_search = $cookies.get('bsearch') || 'all';
      this.search_display = limitToTwoWords(this.headline_search);
      this.loadmoretrack = 9;
      this.loadmorecnt = 9;
    },

    fetchBlogData() {
      if (this.isLoading) return;
      this.isLoading = true;

      const cacheKey = `${this.headline_year}-${this.loadmoretrack}-${this.headline_search}-${this.headline_cat}`;
      if (this.cache[cacheKey]) {
        this.processResponse(this.cache[cacheKey]);
        this.isLoading = false;
      } else {
        const url = `/_blog_json/blog/${this.headline_year}/${this.loadmoretrack}/${this.headline_search}/${this.headline_cat}`;
// alert(url)
        axios.get(url).then(response => {
          this.cache[cacheKey] = response;
          this.processResponse(response);
          this.isLoading = false;
        }).catch(error => {
          this.handleError(error);
          this.isLoading = false;
        });
      }
    },

    processResponse(response) {
      // Add market processing
      if (this.thismarket != '') {     
        var arrayLength = response.data.length;
        market_stub = this.thismarket.toLowerCase().replaceAll(" ", "-");
        for (var i = 0; i < arrayLength; i++) {
          // alert(market_stub)
          if (!response.data[i].link.startsWith('/' + market_stub)) {
            response.data[i].link = '/' + market_stub + response.data[i].link;
          }
          // response.data[i].link = '/' + market_stub + response.data[i].link;
        }
      }
      // Process results
      this.showNoResults = response.data.length === 0;
      this.results = response.data;
      $("#no_results").toggle(this.showNoResults);
      $(".cards__inner").toggle(!this.showNoResults);
      $(".cards__button").toggle(!this.showNoResults);
    },

    handleError(error) {
      // console.error('An error occurred:', error);
    },

    onChange(event) {
      var year = event.target.value;
      $cookies.set('byear', year, 0);
      this.headline_year = year;

      this.fetchBlogData();
    },

    onChangeCat(event) {      
      var catt = event.target.value;
      var aRay = catt.split("|");
      var cat = aRay[0];
      var catname = aRay[1];
      $cookies.set('bcat', cat, 0);
      $cookies.set('bcatname', catname, 0);

      this.headline_cat = cat;
      this.headline_catname = catname;
      if (this.headline_catname === undefined) {
          this.headline_catname = 'all';
          $cookies.set('bcatname', this.headline_catname, 0);
      }
      this.fetchBlogData();
    },

    submitSearch(event) {
      if (event) {
        var search = this.$refs.blog_search.value;
        if(search != '') {
          search = removeFunction(search).replace(/\s+/g, ' ');
          // search = search.replace(/\s+/g, '|'); or &&
          // alert(search)
          this.headline_search = search;
          this.search_display = limitToTwoWords(this.headline_search);
          $cookies.set('bsearch', search, 0); 
         
          this.fetchBlogData();
           // this.headline_search = limitToTwoWords(this.headline_search);
        }
      }
    },

    loadMore() {
      this.loadmoretrack += this.loadmorecnt;
      $cookies.set('loadmoretrack', this.loadmoretrack, 0);
      this.fetchBlogData();
      console.log("New loadmoretrack value:", this.loadmoretrack);
    },

    checkScroll() {
      const nearBottom = window.innerHeight + window.scrollY >= document.body.offsetHeight - this.scroll_offest;
      if (nearBottom && !this.isLoading) {
        this.loadMore();
      }
    }, 

    clearFilter(fil) {
      if(fil == 'year') {
        $cookies.remove('byear');
        this.headline_year = 'all';
        this.fetchBlogData();
        document.getElementById("blog_year").selectedIndex = 0;
      }
      else if(fil == 'cat') { 
        $cookies.remove('bcat');
        $cookies.remove('bcatname');
        this.headline_cat = 'all';
        this.headline_catname = 'all';
        this.fetchBlogData();
        document.getElementById("blog_category").selectedIndex = 0;
      }
      else if(fil == 'search') {
        document.getElementById('blog_search').value = "";
        $cookies.remove('bsearch');
        this.headline_search = 'all';
        this.search_display = 'all';
        this.fetchBlogData();
      }
    },

    clearAll() {
      $cookies.remove('byear');
      $cookies.remove('bcat');
      $cookies.remove('bcatname');
      $cookies.remove('bsearch');
      this.headline_year = 'all';
      this.headline_cat = 'all';
      this.headline_catname = 'all';
      this.headline_search = 'all';
      this.search_display = limitToTwoWords(this.headline_search);
      this.loadmoretrack = this.loadmorecnt;
      document.getElementById('blog_search').value = "";
      var elements = document.getElementsByTagName('select');
      for (var i = 0; i < elements.length; i++) {
        elements[i].selectedIndex = 0;
      } 
      this.fetchBlogData();
    },
  },

  mounted() {
    const referer = document.referrer;
    if (!referer.includes("blog")) {
      ['byear', 'bcat', 'bcatname', 'bsearch'].forEach(cookie => $cookies.remove(cookie));
    }

    //  check for url hash
    const hash = window.location.hash;
    if (hash) {
      this.searchQuery = hash.substring(1); 
      if (this.searchResults.length > 0) {
        var user_cat = this.searchResults[0]['id'];
        var user_catname = this.searchResults[0]['name'];
        $cookies.set('bcat', user_cat, 0);
        $cookies.set('bcatname', user_catname, 0);
        this.headline_cat = user_cat;
        this.headline_catname = user_catname;
      }
    }    

    this.initializeDataFromCookies();
    this.fetchBlogData();
    window.addEventListener('scroll', this.checkScroll);
    this.thismarket = document.getElementById("thismarket").value;
    var menu_value = this.headline_cat+'|'+this.headline_catname;
    if(this.headline_cat == 'all') menu_value = 'all';

    //  sort
    $("#blog_category").html($("#blog_category option").sort(function (a, b) {
        return a.text == b.text ? 0 : a.text < b.text ? -1 : 1
    }))
    document.getElementById("blog_category").value = menu_value;
    //  optional search display
    // if(this.headline_search != 'all') {
    //   document.getElementById("blog_search").value = this.headline_search;
    // }
    
  },

    beforeUnmount() {
    window.removeEventListener('scroll', this.checkScroll);
  },
}).use($cookies).mount('#app');

function removeFunction(inputString) {
    return inputString.replace(/[^a-zA-Z0-9 ]/g, '');
}

function decodeHtmlEntities(text) {
  var textArea = document.createElement('textarea');
  textArea.innerHTML = text;
  return textArea.value;
}

function limitToTwoWords(str) {
  const words = str.split(/\s+/);
  if (words.length > 2) {
    return `${words[0]} ${words[1]}...`;
  } else {
    return str;
  }
}



